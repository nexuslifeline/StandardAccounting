<?php

class Receivable_payment_model extends CORE_Model
{
    protected $table = "receivable_payments";
    protected $pk_id = "payment_id";

    function __construct()
    {
        parent::__construct();
    }



    function get_journal_entries($payment_id){

        $sql="SELECT
                ai.payment_from_customer_id as account_id,
                (
                    SELECT rp.total_paid_amount FROM receivable_payments as rp WHERE rp.payment_id=$payment_id
                ) as dr_amount, 0 as cr_amount,'' as memo

                FROM `account_integration` as ai

                UNION ALL

                SELECT

                ai.receivable_account_id as account_id, 0 as dr_amount ,
                (
                    SELECT rp.total_paid_amount FROM receivable_payments as rp WHERE rp.payment_id=$payment_id
                ) as cr_amount,'' as memo

                FROM `account_integration` as ai";

        return $this->db->query($sql)->result();
    }


}



?>