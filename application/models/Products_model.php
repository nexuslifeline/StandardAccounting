<?php

class Products_model extends CORE_Model {
    protected  $table="products";
    protected  $pk_id="product_id";

    function __construct() {
        parent::__construct();
    }


    function getDepartment()
    {
        $query = $this->db->query('SELECT department_name FROM departments');
        return $query->result();
    }

    function getCode() {
        $query = $this->db->query('SELECT product_code FROM products');
        return $query->result();
    }




    function get_product_history($product_id){
        $this->db->query("SET @nBalance:=0.00;");
        $sql="


                SELECT n.*,p.product_desc,@nBalance:=(@nBalance+(n.in_qty-n.out_qty)) as balance

                FROM

                (SELECT m.*

                FROM
                (SELECT

                (ai.date_adjusted) as txn_date,
                ai.adjustment_code as ref_no,
                ('Adjustment In')as type,
                '' as Description,
                aii.product_id,aii.exp_date,aii.`batch_no`,
                (aii.adjust_qty) as in_qty,
                0 as out_qty


                 FROM adjustment_info as ai
                INNER JOIN `adjustment_items` as aii ON aii.adjustment_id=ai.adjustment_id
                WHERE ai.adjustment_type='IN' AND ai.is_active=TRUE AND ai.is_deleted=FALSE
                AND aii.product_id=$product_id


                UNION ALL


                SELECT

                (ai.date_adjusted) as txn_date,
                ai.adjustment_code as ref_no,
                ('Adjustment Out')as type,
                '' as Description,
                aii.product_id,aii.exp_date,aii.`batch_no`,
                0 as in_qty,
                (aii.adjust_qty)  as out_qty


                 FROM adjustment_info as ai
                INNER JOIN `adjustment_items` as aii ON aii.adjustment_id=ai.adjustment_id
                WHERE ai.adjustment_type='OUT' AND ai.is_active=TRUE AND ai.is_deleted=FALSE
                AND aii.product_id=$product_id



                UNION ALL



                SELECT

                di.date_delivered as txn_date,
                di.dr_invoice_no as ref_no,
                ('Purchase Invoice') as type,
                CONCAT(IFNULL(s.supplier_name,''),' (Supplier)') as Description,
                dii.product_id,
                dii.exp_date,dii.batch_no,
                (dii.dr_qty)as in_qty,0 as out_qty

                FROM (delivery_invoice as di
                LEFT JOIN suppliers as s ON s.supplier_id=di.supplier_id)
                INNER JOIN delivery_invoice_items as dii
                ON dii.dr_invoice_id=di.dr_invoice_id
                WHERE di.is_active=TRUE AND di.is_deleted=FALSE
                AND dii.product_id=$product_id


                UNION ALL


                SELECT

                si.date_invoice as txn_date,
                si.sales_inv_no as ref_no,
                ('Sales Invoice') as type,
                CONCAT(IFNULL(c.customer_name,''),' (Customer)') as Description,
                sii.product_id,
                sii.exp_date,sii.batch_no,
                0 as in_qty,(sii.inv_qty) as out_qty

                FROM (sales_invoice as si
                LEFT JOIN customers as c ON c.customer_id=si.customer_id)
                INNER JOIN sales_invoice_items as sii
                ON sii.sales_invoice_id=si.sales_invoice_id
                WHERE si.is_active=TRUE AND si.is_deleted=FALSE AND si.inv_type=1
                AND sii.product_id=$product_id



                UNION ALL


                SELECT

                ii.date_issued as txn_date,
                ii.slip_no as ref_no,
                'Issuance' as type,
                ii.issued_to_person as Description,

                iit.product_id,iit.exp_date,iit.batch_no,0 as in_qty,
                issue_qty as out_qty

                FROM issuance_info as ii
                INNER JOIN issuance_items as iit ON iit.issuance_id=ii.issuance_id

                WHERE ii.is_active=TRUE AND ii.is_deleted=FALSE
                AND iit.product_id=$product_id


                UNION ALL


                SELECT
                si.`date_invoice` as txn_date,
                si.sales_inv_no as ref_no,
                ('Other Sales Invoice') as type,
                CONCAT(IFNULL(d.department_name,''),' (Branch)') as Description,
                sii.product_id,
                sii.exp_date,sii.batch_no,
                0 as in_qty,(sii.inv_qty) as out_qty

                FROM (sales_invoice as si
                LEFT JOIN departments as d ON d.department_id=si.issue_to_department)
                INNER JOIN sales_invoice_items as sii
                ON sii.sales_invoice_id=si.sales_invoice_id
                WHERE si.is_active=TRUE AND si.is_deleted=FALSE AND si.inv_type=2 AND sii.product_id=$product_id
                ) as m ORDER BY m.txn_date ASC) as n  LEFT JOIN products as p ON n.product_id=p.product_id";

        return $this->db->query($sql)->result();
    }



    function get_product_current_qty($batch_no,$product_id,$expire_date){
        $sql="SELECT `get_product_qty_per_batch`('$batch_no',$product_id,'$expire_date') as batch_qty";
        $result=$this->db->query($sql)->result();
        return (count($result)>0?$result[0]->batch_qty:0);
    }



    function get_current_item_list($criteria="",$type=3){


            //adjusted 1/3/2017
            //added adjustment IN and OUT on Query
            //modified Unique ID based on Batch Number

            $sql="SELECT rc.*,p.*,u.unit_name,

                IFNULL(tt.tax_rate,0) as tax_rate,FORMAT(sale_price,4) as srp
                ,IFNULL(sinv.out_qty,0) as out_qty,

                FORMAT(dealer_price,4) as srp_dealer,
                FORMAT(distributor_price,4) as srp_distributor,
                FORMAT(public_price,4) as srp_public,
                FORMAT(discounted_price,4) as srp_discounted,
                FORMAT(purchase_cost,4) as srp_cost,
                (rc.in_qty-IFNULL(sinv.out_qty,0)-IFNULL(iss.out_qty,0)-IFNULL(aoQ.out_qty,0)) as on_hand_per_batch

                    FROM

                    (

                    SELECT inQ.*,SUM(inQ.receive_qty)as in_qty

 					FROM

 					(SELECT dii.product_id,dii.batch_no,dii.exp_date,
                    CONCAT_WS('-',dii.batch_no,dii.product_id,dii.exp_date)as unq_id,
                    SUM(dii.dr_qty) as receive_qty
                    FROM delivery_invoice_items as dii
                    INNER JOIN delivery_invoice as di
                    ON dii.dr_invoice_id=di.dr_invoice_id
                    WHERE di.is_active=TRUE AND di.is_deleted=FALSE
                    GROUP BY dii.product_id,dii.`batch_no`,dii.exp_date


 					UNION ALL


  					SELECT aii.product_id,aii.batch_no,aii.exp_date,
                    CONCAT_WS('-',aii.batch_no,aii.product_id,aii.exp_date)as unq_id,
                    SUM(aii.adjust_qty) as receive_qty
                    FROM adjustment_items as aii
                    INNER JOIN adjustment_info as ai
                    ON aii.adjustment_id=ai.adjustment_id
                    WHERE ai.adjustment_type='IN' AND ai.is_active=TRUE AND ai.is_deleted=FALSE

                    GROUP BY aii.product_id,aii.batch_no,aii.exp_date) as inQ

                    GROUP By inQ.product_id,inQ.batch_no,inQ.exp_date




                    )as rc


                    LEFT JOIN


                    (SELECT sii.product_id,
                    CONCAT_WS('-',sii.batch_no,sii.product_id,sii.exp_date)as unq_id,
                    SUM(sii.inv_qty) as out_qty
                    FROM sales_invoice_items as sii
                    INNER JOIN sales_invoice as si ON sii.sales_invoice_id=si.sales_invoice_id
                    WHERE si.is_active=TRUE AND si.is_deleted=FALSE
                    GROUP BY sii.product_id,sii.batch_no,sii.exp_date) as sinv

                    ON rc.unq_id=sinv.unq_id

                    LEFT JOIN

                    (  SELECT iss.product_id,
                    CONCAT_WS('-',iss.batch_no,iss.product_id,iss.exp_date)as unq_id,
                    SUM(iss.issue_qty) as out_qty
                    FROM issuance_items as iss INNER JOIN issuance_info as iin ON iin.issuance_id=iss.issuance_id
                    WHERE iin.is_active=TRUE AND iin.is_deleted=FALSE
                    GROUP BY iss.product_id,iss.batch_no,iss.exp_date)as iss

                    ON rc.unq_id=iss.unq_id

                    LEFT JOIN

                    (
                    SELECT aii.product_id,aii.batch_no,aii.exp_date,
                    CONCAT_WS('-',aii.batch_no,aii.product_id,aii.exp_date)as unq_id,
                    SUM(aii.adjust_qty) as out_qty
                    FROM adjustment_items as aii
                    INNER JOIN adjustment_info as ai
                    ON aii.adjustment_id=ai.adjustment_id
                    WHERE ai.adjustment_type='OUT' AND ai.is_active=TRUE AND ai.is_deleted=FALSE

                    GROUP BY aii.product_id,aii.batch_no,aii.exp_date
                    )as aoQ

                    ON rc.unq_id=aoQ.unq_id



                    LEFT JOIN

                    products as p ON rc.product_id=p.product_id

                    LEFT JOIN tax_types as tt ON p.tax_type_id=tt.tax_type_id
                    LEFT JOIN units as u ON p.unit_id=u.unit_id


                    WHERE ".($type==3?"":" p.refproduct_id=".$type." AND ")." (p.product_desc LIKE '%".$criteria."%' OR p.product_code LIKE '%".$criteria."%' OR p.product_desc1 LIKE '%".$criteria."%' OR CAST(p.product_id AS CHAR) LIKE '%".$criteria."%') HAVING on_hand_per_batch>0";


        return $this->db->query($sql)->result();
    }


    //per expiration inventory report
    function get_all_items_inventory($date){
        $sql="SELECT rc.*,p.*,rp.product_type,cat.category_name,DATE_FORMAT(exp_date,'%m/%d/%Y')as expiration,IFNULL(sinv.out_qty,0) as out_qty,(rc.in_qty-IFNULL(sinv.out_qty,0)-IFNULL(iss.out_qty,0)) as on_hand
                    FROM

                    (

                    SELECT dii.product_id,di.batch_no,di.dr_invoice_id,dii.exp_date,
                    CONCAT_WS('-',dii.dr_invoice_id,dii.product_id,dii.exp_date)as unq_id,
                    SUM(dii.dr_qty) as in_qty
                    FROM delivery_invoice_items as dii
                    INNER JOIN delivery_invoice as di
                    ON dii.dr_invoice_id=di.dr_invoice_id
                    WHERE di.date_created<='".$date." 00:00:00' AND di.is_deleted=FALSE AND di.is_active=TRUE
                    GROUP BY dii.product_id,dii.dr_invoice_id)as rc


                    LEFT JOIN


                    (SELECT sii.product_id,
                    CONCAT_WS('-',sii.dr_invoice_id,sii.product_id,sii.exp_date)as unq_id,
                    SUM(sii.inv_qty) as out_qty
                    FROM sales_invoice_items as sii
                    INNER JOIN sales_invoice as si ON sii.sales_invoice_id=si.sales_invoice_id
                    WHERE si.date_created<='".$date." 00:00:00' AND si.is_deleted=FALSE AND si.is_active=TRUE
                    GROUP BY sii.product_id,sii.dr_invoice_id) as sinv

                    ON rc.unq_id=sinv.unq_id

                    LEFT JOIN

                    ( SELECT iss.product_id,
                    CONCAT_WS('-',iss.dr_invoice_id,iss.product_id,iss.exp_date)as unq_id,
                    SUM(iss.issue_qty) as out_qty
                    FROM issuance_items as iss
                    INNER JOIN issuance_info as ii ON iss.issuance_id=ii.issuance_id
                    WHERE ii.date_created<='".$date." 00:00:00' AND ii.is_deleted=FALSE AND ii.is_active=TRUE
                    GROUP BY iss.product_id,iss.dr_invoice_id)as iss

                    ON rc.unq_id=iss.unq_id



                    LEFT JOIN

                    products as p ON rc.product_id=p.product_id

                    LEFT JOIN refproduct as rp ON rp.refproduct_id=p.refproduct_id

                    LEFT JOIN categories as cat ON cat.category_id=p.category_id




                    ORDER BY p.product_desc,exp_date
                    ";






        $sql="SELECT rc.*,p.*,c.category_name,DATE_FORMAT(rc.exp_date,'%m/%d/%Y')as expiration,

                    FORMAT(sale_price,2) as srp
                    ,IFNULL(sinv.out_qty,0) as out_qty,

                    (rc.in_qty-IFNULL(sinv.out_qty,0)-IFNULL(iss.out_qty,0)-IFNULL(aoQ.out_qty,0)) as on_hand_per_batch

                    FROM

                    (

                    SELECT inQ.*,SUM(inQ.receive_qty)as in_qty

 					FROM

 					(SELECT dii.product_id,dii.batch_no,dii.exp_date,
                    CONCAT_WS('-',dii.batch_no,dii.product_id,dii.exp_date)as unq_id,
                    SUM(dii.dr_qty) as receive_qty
                    FROM delivery_invoice_items as dii
                    INNER JOIN delivery_invoice as di
                    ON dii.dr_invoice_id=di.dr_invoice_id
                    WHERE di.is_active=TRUE AND di.is_deleted=FALSE
                    AND di.date_delivered<='$date'
                    GROUP BY dii.product_id,dii.`batch_no`,dii.exp_date


 					UNION ALL


  					SELECT aii.product_id,aii.batch_no,aii.exp_date,
                    CONCAT_WS('-',aii.batch_no,aii.product_id,aii.exp_date)as unq_id,
                    SUM(aii.adjust_qty) as receive_qty
                    FROM adjustment_items as aii
                    INNER JOIN adjustment_info as ai
                    ON aii.adjustment_id=ai.adjustment_id
                    WHERE ai.adjustment_type='IN' AND ai.is_active=TRUE AND ai.is_deleted=FALSE
                    AND ai.date_adjusted<='$date'
                    GROUP BY aii.product_id,aii.batch_no,aii.exp_date) as inQ

                    GROUP By inQ.product_id,inQ.batch_no,inQ.exp_date




                    )as rc


                    LEFT JOIN


                    (SELECT sii.product_id,
                    CONCAT_WS('-',sii.batch_no,sii.product_id,sii.exp_date)as unq_id,
                    SUM(sii.inv_qty) as out_qty
                    FROM sales_invoice_items as sii
                    INNER JOIN sales_invoice as si
                    ON sii.sales_invoice_id=si.sales_invoice_id
                    WHERE si.is_active=TRUE AND si.is_deleted=FALSE
                    AND si.date_invoice<='$date'
                    GROUP BY sii.product_id,sii.batch_no,sii.exp_date) as sinv

                    ON rc.unq_id=sinv.unq_id

                    LEFT JOIN

                    (SELECT iss.product_id,
                    CONCAT_WS('-',iss.batch_no,iss.product_id,iss.exp_date)as unq_id,
                    SUM(iss.issue_qty) as out_qty
                    FROM issuance_items as iss
                    INNER JOIN issuance_info as iin
                    ON iss.issuance_id=iin.issuance_id
                    WHERE iin.date_issued<='$date' AND iin.is_active=TRUE AND iin.is_deleted=FALSE
                    GROUP BY iss.product_id,iss.batch_no,iss.exp_date)as iss

                    ON rc.unq_id=iss.unq_id

                    LEFT JOIN

                    (

                    SELECT aii.product_id,aii.batch_no,aii.exp_date,
                    CONCAT_WS('-',aii.batch_no,aii.product_id,aii.exp_date)as unq_id,
                    SUM(aii.adjust_qty) as out_qty
                    FROM adjustment_items as aii
                    INNER JOIN adjustment_info as ai
                    ON aii.adjustment_id=ai.adjustment_id
                    WHERE ai.adjustment_type='OUT' AND ai.is_active=TRUE AND ai.is_deleted=FALSE
                    AND ai.date_adjusted<='$date'

                    GROUP BY aii.product_id,aii.batch_no,aii.exp_date
                    )as aoQ

                    ON rc.unq_id=aoQ.unq_id



                    LEFT JOIN

                    products as p ON rc.product_id=p.product_id

                    LEFT JOIN categories as c ON p.category_id=c.category_id

                    ORDER BY p.product_desc,exp_date

                    ";


        return $this->db->query($sql)->result();
    }








}
?>