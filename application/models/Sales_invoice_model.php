<?php

class Sales_invoice_model extends CORE_Model
{
    protected $table = "sales_invoice";
    protected $pk_id = "sales_invoice_id";

    function __construct()
    {
        parent::__construct();
    }

    function get_journal_entries($sales_invoice_id){
        $sql="SELECT main.* FROM(SELECT
            p.income_account_id as account_id,
            '' as memo,
            SUM(sii.inv_non_tax_amount) cr_amount,
            0 as dr_amount

            FROM `sales_invoice_items` as sii
            INNER JOIN products as p ON sii.product_id=p.product_id
            WHERE sii.sales_invoice_id=$sales_invoice_id AND p.income_account_id>0
            GROUP BY p.income_account_id

            UNION ALL


            SELECT output_tax.account_id,output_tax.memo,
            SUM(output_tax.cr_amount)as cr_amount,0 as dr_amount
             FROM
            (SELECT sii.product_id,

            (SELECT output_tax_account_id FROM account_integration) as account_id
            ,
            '' as memo,
            SUM(sii.inv_tax_amount) as cr_amount,
            0 as dr_amount

            FROM `sales_invoice_items` as sii
            INNER JOIN products as p ON sii.product_id=p.product_id
            WHERE sii.sales_invoice_id=$sales_invoice_id AND p.income_account_id>0
            )as output_tax GROUP BY output_tax.account_id

            UNION ALL

            SELECT acc_receivable.account_id,acc_receivable.memo,
            0 as cr_amount,SUM(acc_receivable.dr_amount) as dr_amount
             FROM
            (SELECT sii.product_id,

            (SELECT receivable_account_id FROM account_integration) as account_id
            ,
            '' as memo,
            0 cr_amount,
            SUM(sii.inv_line_total_price) as dr_amount

            FROM `sales_invoice_items` as sii
            INNER JOIN products as p ON sii.product_id=p.product_id
            WHERE sii.sales_invoice_id=$sales_invoice_id AND p.income_account_id>0
            ) as acc_receivable GROUP BY acc_receivable.account_id)as main WHERE main.dr_amount>0 OR main.cr_amount>0";

        return $this->db->query($sql)->result();



    }

    function get_report_summary($startDate,$endDate){
        $sql="SELECT
            si.sales_inv_no,
            c.*,
            si.date_invoice,
            si.total_after_tax,
            si.remarks
            FROM 
            sales_invoice AS si
            LEFT JOIN customers AS c ON c.customer_id = si.customer_id
            WHERE date_invoice BETWEEN '$startDate' AND '$endDate' AND inv_type=1
            ORDER BY si.customer_id";

        return $this->db->query($sql)->result();
    }


    function get_sales_summary($start=null,$end=null){
        $sql="SELECT mQ.*,DATE_FORMAT(mQ.date_invoice,'%m/%d/%Y') as inv_date,(mQ.sales-mQ.cost_of_sales) as net_profit
                FROM
                (

                SELECT nQ.*,
                (

                IF(nQ.inv_price=0,0,nQ.purchase_cost*nQ.inv_qty)

                )as cost_of_sales

                FROM
                (SELECT si.sales_inv_no,si.date_invoice,sii.inv_price,
                '' as dr_si,'' as vr,c.customer_name,
                IF(sii.inv_price=0,CONCAT(pr.product_desc,' (Free)'),pr.product_desc)as product_desc,
                refp.product_type,

                IF(sii.inv_price=0,0,SUM(sii.inv_qty))as inv_qty,

                IF(sii.inv_price=0,SUM(sii.inv_qty),0) as fg, /**this free item**/

                pr.size,
                s.supplier_name,sii.inv_price as srp,
                IFNULL(SUM(sii.inv_line_total_price),0) as sales,

                IF(sii.inv_price=0,
                  0,
                  sii.cost_upon_invoice
                )as purchase_cost /**GET THE COST OF THE PRODUCT WHEN IT WAS INVOICED**/



                FROM sales_invoice as si

                LEFT JOIN customers as c ON si.customer_id=c.customer_id
                INNER JOIN sales_invoice_items as sii ON si.sales_invoice_id=sii.sales_invoice_id
                LEFT JOIN (products as pr  LEFT JOIN refproduct as refp ON refp.refproduct_id=pr.refproduct_id)ON sii.product_id=pr.product_id
                LEFT JOIN suppliers as s ON pr.supplier_id=s.supplier_id

                WHERE si.date_invoice BETWEEN '$start' AND '$end' AND si.is_active=TRUE AND si.is_deleted=FALSE

                GROUP BY si.sales_inv_no,sii.product_id,sii.inv_price,IF(sii.inv_price=0,
                  0,
                  sii.cost_upon_invoice
                ))as nQ) mQ
                ";

            return $this->db->query($sql)->result();
    }


    function get_per_customer_sales_summary($start=null,$end=null,$customer_id=null){
        $sql="SELECT n.* FROM(SELECT si.sales_invoice_id,
            si.sales_inv_no,si.customer_id,c.customer_name,'SI' as type,c.address,c.contact_no,c.email_address,
            SUM(sii.inv_line_total_price)as total_amount_invoice

            FROM (sales_invoice as si
            LEFT JOIN customers as c ON c.customer_id=si.customer_id)
            INNER JOIN sales_invoice_items as sii ON si.sales_invoice_id=sii.sales_invoice_id
            WHERE si.is_active=TRUE AND si.is_deleted=FALSE
            AND si.date_invoice BETWEEN '$start' AND '$end' AND si.inv_type=1
            GROUP BY si.customer_id


            UNION ALL


            SELECT si.sales_invoice_id,
            si.sales_inv_no,d.department_id as customer_id,
            CONCAT(d.department_name,' (DR)') as customer_name,'DR' as type,'' as address,'' as contact_no,'' as email_address,
            SUM(sii.inv_line_total_price)as total_amount_invoice

            FROM (sales_invoice as si
            LEFT JOIN departments as d ON d.department_id=si.issue_to_department)
            INNER JOIN sales_invoice_items as sii ON si.sales_invoice_id=sii.sales_invoice_id
            WHERE si.is_active=TRUE AND si.is_deleted=FALSE
            AND si.date_invoice BETWEEN '$start' AND '$end' AND si.inv_type=2
            GROUP BY si.department_id) as  n ORDER By n.customer_name";
        return $this->db->query($sql)->result();
    }

    function get_sales_detailed_list($start=null,$end=null){ 
        $sql="SELECT  
                si.sales_invoice_id, 
                si.sales_inv_no, 
                si.date_invoice, 
                si.customer_id, 
                c.customer_name, 
                p.product_id, 
                p.product_code, 
                p.product_desc, 
                p.sale_price, 
                sii.inv_qty, 
                s.salesperson_id,
                s.salesperson_code,
                CONCAT(s.firstname,' ',s.lastname) AS salesperson_name,
                ((p.sale_price) * (sii.inv_qty)) as total_amount 
            FROM 
                (sales_invoice AS si 
                LEFT JOIN customers AS c ON c.customer_id = si.customer_id) 
                INNER JOIN sales_invoice_items AS sii ON si.sales_invoice_id = sii.sales_invoice_id 
                LEFT JOIN products AS p ON p.product_id=sii.product_id
                LEFT JOIN salesperson AS s ON s.salesperson_id=si.salesperson_id
            WHERE 
                si.is_active = TRUE AND si.is_deleted = FALSE 
                AND si.date_invoice BETWEEN '$start' AND '$end' 
            ORDER BY si.sales_inv_no ASC"; 
        return $this->db->query($sql)->result();
    }

    function get_sales_summary_list($start=null,$end=null){ 
        $sql="SELECT
                  si.customer_id, 
                  c.customer_code,
                  c.customer_name,
                  s.salesperson_code,
                  CONCAT(s.firstname,' ',s.lastname) AS salesperson_name,
                  SUM((p.sale_price) * (sii.inv_qty)) as total_amount 
              FROM 
                  (sales_invoice AS si 
                  LEFT JOIN customers AS c ON c.customer_id = si.customer_id) 
                  INNER JOIN sales_invoice_items AS sii ON si.sales_invoice_id = sii.sales_invoice_id 
                  LEFT JOIN products AS p ON p.product_id=sii.product_id 
                  LEFT JOIN salesperson AS s ON s.salesperson_id=si.salesperson_id
              WHERE 
                  si.is_active = TRUE AND si.is_deleted = FALSE 
                  AND si.date_invoice BETWEEN '$start' AND '$end'
              GROUP BY si.customer_id"; 
        return $this->db->query($sql)->result();
    }

    function get_sales_product_summary_list($start=null,$end=null){
        $sql="SELECT
                  si.customer_id,
                  p.product_code,
                  p.product_desc,
                  SUM((p.sale_price) * (sii.inv_qty)) as total_amount 
              FROM 
                  (sales_invoice AS si) 
                  INNER JOIN sales_invoice_items AS sii ON si.sales_invoice_id = sii.sales_invoice_id 
                  LEFT JOIN products AS p ON p.product_id=sii.product_id
              WHERE 
                  si.is_active = TRUE AND si.is_deleted = FALSE 
                  AND si.date_invoice BETWEEN '$start' AND '$end'
              GROUP BY sii.product_id";
         return $this->db->query($sql)->result();
    }

    function list_with_count($filter_id){
    $sql="SELECT
        si.sales_invoice_id,
        si.sales_inv_no,
        si.remarks, 
        si.date_created,
        si.customer_id,
        si.inv_type,
        si.is_journal_posted,
        DATE_FORMAT(si.date_invoice,'%m/%d/%Y') as date_invoice,
        DATE_FORMAT(si.date_due,'%m/%d/%Y') as date_due,

        si.salesperson_id,
        si.address,

        departments.department_id,
        departments.department_name,
        customers.customer_name,
        sales_order.so_no,


        IFNULL(count.count,0) as count
        FROM sales_invoice AS si

        LEFT JOIN

        (SELECT
        rp.payment_id,
        rpl.sales_invoice_id,
        count(sales_invoice_id) AS count
        FROM receivable_payments_list AS rpl
        LEFT JOIN receivable_payments AS rp ON rp.payment_id = rpl.payment_id
        WHERE rp.is_active= TRUE AND rp.is_deleted = FALSE
        group by rpl.sales_invoice_id) AS count

        ON count.sales_invoice_id = si.sales_invoice_id
        LEFT JOIN departments ON departments.department_id=si.department_id
        LEFT JOIN customers  ON customers.customer_id=si.customer_id
        LEFT JOIN sales_order ON sales_order.sales_order_id=si.sales_order_id


        WHERE si.is_active= TRUE AND si.is_deleted =  FALSE";

         return $this->db->query($sql)->result();
    } 
}


?>