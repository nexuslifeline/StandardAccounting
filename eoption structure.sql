# SQL Manager 2010 Lite for MySQL 4.6.0.5
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : eoption


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `eoption`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `eoption`;

#
# Structure for the `account_classes` table : 
#

CREATE TABLE `account_classes` (
  `account_class_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_class` varchar(755) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `account_type_id` int(11) DEFAULT '0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` date DEFAULT '0000-00-00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`account_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

#
# Structure for the `account_integration` table : 
#

CREATE TABLE `account_integration` (
  `integration_id` int(11) NOT NULL,
  `input_tax_account_id` bigint(20) DEFAULT '0',
  `payable_account_id` bigint(20) DEFAULT '0',
  `payable_discount_account_id` bigint(20) DEFAULT '0',
  `output_tax_account_id` bigint(20) DEFAULT '0',
  `receivable_account_id` bigint(20) DEFAULT '0',
  `receivable_discount_account_id` bigint(20) DEFAULT '0',
  PRIMARY KEY (`integration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `account_titles` table : 
#

CREATE TABLE `account_titles` (
  `account_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_no` varchar(75) DEFAULT '',
  `account_title` varchar(755) DEFAULT '',
  `account_class_id` int(11) DEFAULT '0',
  `parent_account_id` int(11) DEFAULT '0',
  `grand_parent_id` int(11) DEFAULT '0',
  `description` varchar(1000) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

#
# Structure for the `account_types` table : 
#

CREATE TABLE `account_types` (
  `account_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type` varchar(155) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  PRIMARY KEY (`account_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `account_year` table : 
#

CREATE TABLE `account_year` (
  `account_year_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_year` varchar(100) DEFAULT '',
  `description` varchar(755) DEFAULT '',
  `status` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_closed` datetime DEFAULT '0000-00-00 00:00:00',
  `closed_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`account_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `adjustment_info` table : 
#

CREATE TABLE `adjustment_info` (
  `adjustment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `adjustment_code` varchar(75) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `adjustment_type` varchar(20) DEFAULT 'IN',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `date_adjusted` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT NULL,
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`adjustment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `products` table : 
#

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_desc1` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `supplier_id` bigint(20) NOT NULL DEFAULT '0',
  `tax_type_id` bigint(20) DEFAULT '0',
  `refproduct_id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `equivalent_points` int(11) NOT NULL,
  `product_warn` decimal(16,2) NOT NULL,
  `product_ideal` decimal(16,2) NOT NULL,
  `purchase_cost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `purchase_cost_2` decimal(20,2) DEFAULT '0.00',
  `markup_percent` decimal(16,2) NOT NULL,
  `sale_price` decimal(16,2) NOT NULL,
  `whole_sale` decimal(16,2) NOT NULL,
  `retailer_price` decimal(16,2) NOT NULL,
  `special_disc` decimal(16,2) NOT NULL,
  `discounted_price` decimal(16,2) NOT NULL,
  `dealer_price` decimal(16,2) NOT NULL,
  `distributor_price` decimal(16,2) NOT NULL,
  `public_price` decimal(16,2) NOT NULL,
  `valued_customer` decimal(16,2) NOT NULL,
  `income_account_id` bigint(20) NOT NULL,
  `expense_account_id` bigint(20) NOT NULL,
  `on_hand` decimal(20,2) DEFAULT '0.00',
  `item_type_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) NOT NULL,
  `modified_by_user` int(11) NOT NULL,
  `deleted_by_user` int(11) NOT NULL,
  `is_inventory` bit(1) NOT NULL DEFAULT b'1',
  `is_tax_exempt` tinyint(1) NOT NULL,
  `is_deleted` bit(1) NOT NULL,
  `is_active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1720 DEFAULT CHARSET=latin1;

#
# Structure for the `adjustment_items` table : 
#

CREATE TABLE `adjustment_items` (
  `adjustment_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `adjust_qty` decimal(20,2) DEFAULT '0.00',
  `adjust_price` decimal(20,2) DEFAULT '0.00',
  `adjust_discount` decimal(20,2) DEFAULT '0.00',
  `adjust_tax_rate` decimal(20,2) DEFAULT '0.00',
  `adjust_line_total_price` decimal(20,2) DEFAULT '0.00',
  `adjust_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `adjust_tax_amount` decimal(20,2) DEFAULT '0.00',
  `adjust_non_tax_amount` decimal(11,2) DEFAULT '0.00',
  `exp_date` date DEFAULT '0000-00-00',
  `batch_no` varchar(55) DEFAULT '',
  PRIMARY KEY (`adjustment_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

CREATE DEFINER = 'root'@'localhost' TRIGGER `adjustment_items_after_ins_tr` AFTER INSERT ON `adjustment_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",NEW.batch_no,NEW.product_id,NEW.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,NEW.product_id,NEW.batch_no,NEW.exp_date,get_product_qty_per_batch(NEW.batch_no,NEW.product_id,NEW.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
    */


	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=NEW.product_id;

END;

CREATE DEFINER = 'root'@'localhost' TRIGGER `adjustment_items_after_del_tr` AFTER DELETE ON `adjustment_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",OLD.batch_no,OLD.product_id,OLD.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,OLD.product_id,OLD.batch_no,OLD.exp_date,get_product_qty_per_batch(OLD.batch_no,OLD.product_id,OLD.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
*/
	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=OLD.product_id;

END;

#
# Structure for the `delivery_invoice` table : 
#

CREATE TABLE `delivery_invoice` (
  `dr_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dr_invoice_no` varchar(75) DEFAULT '',
  `purchase_order_id` int(11) DEFAULT '0',
  `external_ref_no` varchar(75) DEFAULT '',
  `contact_person` varchar(155) DEFAULT '',
  `terms` varchar(55) DEFAULT '',
  `duration` varchar(75) DEFAULT '',
  `supplier_id` int(11) DEFAULT '0',
  `department_id` bigint(20) DEFAULT '0',
  `tax_type_id` int(11) DEFAULT '0',
  `journal_id` bigint(20) DEFAULT '0',
  `remarks` varchar(555) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_paid` bit(1) DEFAULT b'0',
  `is_journal_posted` bit(1) DEFAULT b'0',
  `date_due` date DEFAULT '0000-00-00',
  `date_delivered` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `batch_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dr_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `delivery_invoice_items` table : 
#

CREATE TABLE `delivery_invoice_items` (
  `dr_invoice_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dr_invoice_id` bigint(20) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `dr_qty` decimal(20,2) DEFAULT '0.00',
  `dr_discount` decimal(20,2) DEFAULT '0.00',
  `dr_price` decimal(20,2) DEFAULT '0.00',
  `dr_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `dr_line_total_price` decimal(20,2) DEFAULT '0.00',
  `dr_tax_rate` decimal(20,2) DEFAULT '0.00',
  `dr_tax_amount` decimal(20,2) DEFAULT '0.00',
  `dr_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  `exp_date` date DEFAULT '0000-00-00',
  `batch_no` varchar(55) DEFAULT '',
  PRIMARY KEY (`dr_invoice_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE DEFINER = 'root'@'localhost' TRIGGER `delivery_invoice_items_after_ins_tr` AFTER INSERT ON `delivery_invoice_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",NEW.batch_no,NEW.product_id,NEW.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,NEW.product_id,NEW.batch_no,NEW.exp_date,get_product_qty_per_batch(NEW.batch_no,NEW.product_id,NEW.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
    
    */
	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=NEW.product_id;

END;

CREATE DEFINER = 'root'@'localhost' TRIGGER `delivery_invoice_items_after_del_tr` AFTER DELETE ON `delivery_invoice_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",OLD.batch_no,OLD.product_id,OLD.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,OLD.product_id,OLD.batch_no,OLD.exp_date,get_product_qty_per_batch(OLD.batch_no,OLD.product_id,OLD.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
*/
	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=OLD.product_id;
END;

#
# Structure for the `issuance_info` table : 
#

CREATE TABLE `issuance_info` (
  `issuance_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slip_no` varchar(75) DEFAULT '',
  `issued_department_id` int(11) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `issued_to_person` varchar(155) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `date_issued` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `customer_id` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `terms` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`issuance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `issuance_items` table : 
#

CREATE TABLE `issuance_items` (
  `issuance_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `issuance_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `issue_qty` decimal(20,2) DEFAULT '0.00',
  `issue_price` decimal(20,2) DEFAULT '0.00',
  `issue_discount` decimal(20,2) DEFAULT '0.00',
  `issue_tax_rate` decimal(11,2) DEFAULT '0.00',
  `issue_line_total_price` decimal(20,2) DEFAULT '0.00',
  `issue_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `issue_tax_amount` decimal(20,2) DEFAULT '0.00',
  `issue_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  `dr_invoice_id` bigint(20) DEFAULT '0',
  `exp_date` date DEFAULT '0000-00-00',
  `batch_no` varchar(55) DEFAULT '',
  PRIMARY KEY (`issuance_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE DEFINER = 'root'@'localhost' TRIGGER `issuance_items_after_ins_tr` AFTER INSERT ON `issuance_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",NEW.batch_no,NEW.product_id,NEW.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,NEW.product_id,NEW.batch_no,NEW.exp_date,get_product_qty_per_batch(NEW.batch_no,NEW.product_id,NEW.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
    */


	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=NEW.product_id;

END;

CREATE DEFINER = 'root'@'localhost' TRIGGER `issuance_items_after_del_tr` AFTER DELETE ON `issuance_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",OLD.batch_no,OLD.product_id,OLD.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,OLD.product_id,OLD.batch_no,OLD.exp_date,get_product_qty_per_batch(OLD.batch_no,OLD.product_id,OLD.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
*/
	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=OLD.product_id;

END;

#
# Structure for the `sales_invoice` table : 
#

CREATE TABLE `sales_invoice` (
  `sales_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_inv_no` varchar(75) DEFAULT '',
  `sales_order_id` bigint(20) DEFAULT '0',
  `sales_order_no` varchar(75) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `journal_id` bigint(20) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `date_due` date DEFAULT '0000-00-00',
  `date_invoice` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `is_paid` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_journal_posted` bit(1) DEFAULT b'0',
  `ref_product_type_id` int(11) DEFAULT NULL,
  `inv_type` int(11) DEFAULT '1',
  `salesperson_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `sales_invoice_items` table : 
#

CREATE TABLE `sales_invoice_items` (
  `sales_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_invoice_id` bigint(20) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `inv_price` decimal(20,2) DEFAULT '0.00',
  `inv_discount` decimal(20,2) DEFAULT '0.00',
  `inv_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `inv_tax_rate` decimal(20,2) DEFAULT '0.00',
  `inv_qty` decimal(20,2) DEFAULT NULL,
  `inv_line_total_price` decimal(20,2) DEFAULT '0.00',
  `inv_tax_amount` decimal(20,2) DEFAULT '0.00',
  `inv_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  `inv_notes` varchar(100) DEFAULT NULL,
  `dr_invoice_id` int(11) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `batch_no` varchar(55) DEFAULT '',
  PRIMARY KEY (`sales_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE DEFINER = 'root'@'localhost' TRIGGER `sales_invoice_items_after_ins_tr` AFTER INSERT ON `sales_invoice_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",NEW.batch_no,NEW.product_id,NEW.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,NEW.product_id,NEW.batch_no,NEW.exp_date,get_product_qty_per_batch(NEW.batch_no,NEW.product_id,NEW.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
    
*/

	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=NEW.product_id;
END;

CREATE DEFINER = 'root'@'localhost' TRIGGER `sales_invoice_items_after_del_tr` AFTER DELETE ON `sales_invoice_items`
  FOR EACH ROW
BEGIN
	/*DECLARE vProdKey VARCHAR(100);
    SET vProdKey=CONCAT_WS("-",OLD.batch_no,OLD.product_id,OLD.exp_date);


	INSERT INTO product_batch_inventory(product_key,product_id,batch_no,exp_date,batch_exp_on_hand)
    VALUES(vProdKey,OLD.product_id,OLD.batch_no,OLD.exp_date,get_product_qty_per_batch(OLD.batch_no,OLD.product_id,OLD.exp_date))
	ON DUPLICATE KEY UPDATE  
    product_batch_inventory.batch_exp_on_hand=VALUES(product_batch_inventory.batch_exp_on_hand);
*/
	UPDATE `products` SET on_hand=(get_product_qty(products.product_id)) 
	WHERE product_id=OLD.product_id;
END;

#
# Definition for the `get_product_qty` function : 
#

CREATE DEFINER = 'root'@'localhost' FUNCTION `get_product_qty`(
        `product_id` INTEGER(20)
    )
    RETURNS decimal(20,0)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
	DECLARE IN_QTY DECIMAL;
    DECLARE OUT_QTY DECIMAL;
    DECLARE ADJ_IN_QTY DECIMAL;
    DECLARE ADJ_OUT_QTY DECIMAL;
    DECLARE SI_OUT_QTY DECIMAL;
    DECLARE ON_HAND DECIMAL;
    
    
    
    SET IN_QTY=(
    	SELECT IFNULL(SUM(dii.dr_qty),0) FROM delivery_invoice_items as dii
    	INNER JOIN delivery_invoice as di ON dii.dr_invoice_id=di.dr_invoice_id
    	WHERE dii.product_id=product_id AND di.is_active=TRUE AND di.is_deleted=FALSE
    );
    
    
    SET OUT_QTY=(
    	SELECT IFNULL(SUM(iss.issue_qty),0) FROM issuance_items as iss
    	INNER JOIN issuance_info as ii ON iss.issuance_id=ii.issuance_id
    	WHERE iss.product_id=product_id AND ii.is_active=TRUE AND ii.is_deleted=FALSE
    );
    
    
    SET ADJ_OUT_QTY=(
    	SELECT IFNULL(SUM(ai.adjust_qty),0) FROM adjustment_items as ai
    	INNER JOIN adjustment_info as a ON a.adjustment_id=ai.adjustment_id
    	WHERE ai.product_id=product_id AND a.is_active=TRUE AND a.is_deleted=FALSE 
        AND a.adjustment_type='OUT'
    );
    
    SET ADJ_IN_QTY=(
    	SELECT IFNULL(SUM(ai.adjust_qty),0) FROM adjustment_items as ai
    	INNER JOIN adjustment_info as a ON a.adjustment_id=ai.adjustment_id
    	WHERE ai.product_id=product_id AND a.is_active=TRUE AND a.is_deleted=FALSE 
        AND a.adjustment_type='IN'
    );
    
    
    SET SI_OUT_QTY=(
    	SELECT IFNULL(SUM(sii.inv_qty),0) FROM `sales_invoice_items` as sii
    	INNER JOIN sales_invoice as si ON si.sales_invoice_id=sii.sales_invoice_id
    	WHERE sii.product_id=product_id AND si.is_active=TRUE AND si.is_deleted=FALSE         
    );

	SET ON_HAND=((IN_QTY-OUT_QTY)+(ADJ_IN_QTY-ADJ_OUT_QTY))-SI_OUT_QTY;
  RETURN ON_HAND;
END;

#
# Structure for the `approval_status` table : 
#

CREATE TABLE `approval_status` (
  `approval_id` int(11) NOT NULL AUTO_INCREMENT,
  `approval_status` varchar(100) DEFAULT '',
  `approval_description` varchar(555) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`approval_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `brands` table : 
#

CREATE TABLE `brands` (
  `brand_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `cards` table : 
#

CREATE TABLE `cards` (
  `card_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `categories` table : 
#

CREATE TABLE `categories` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_code` bigint(20) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

#
# Structure for the `company_info` table : 
#

CREATE TABLE `company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(555) DEFAULT '',
  `company_address` varchar(755) DEFAULT '',
  `email_address` varchar(155) DEFAULT '',
  `mobile_no` varchar(125) DEFAULT '',
  `landline` varchar(125) DEFAULT '',
  `tin_no` varchar(55) DEFAULT NULL,
  `tax_type_id` int(11) DEFAULT '0',
  `registered_to` varchar(555) DEFAULT '',
  `logo_path` varchar(555) DEFAULT '',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `customer_photos` table : 
#

CREATE TABLE `customer_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT '0',
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

#
# Structure for the `customers` table : 
#

CREATE TABLE `customers` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `refcustomertype_id` varchar(100) NOT NULL,
  `tin_no` varchar(100) NOT NULL,
  `photo_path` varchar(500) NOT NULL,
  `total_receivable_amount` decimal(19,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) NOT NULL,
  `modified_by_user` int(11) NOT NULL,
  `deleted_by_user` int(11) NOT NULL,
  `is_paid` bit(1) NOT NULL,
  `is_deleted` bit(1) NOT NULL,
  `is_active` bit(1) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1903 DEFAULT CHARSET=latin1;

#
# Structure for the `departments` table : 
#

CREATE TABLE `departments` (
  `department_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(20) DEFAULT '',
  `department_name` varchar(255) DEFAULT '',
  `department_desc` varchar(255) DEFAULT '',
  `delivery_address` varchar(755) DEFAULT '',
  `default_cost` tinyint(4) DEFAULT '1' COMMENT '1=Purchase Cost 1, 2=Purchase Cost 2',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for the `discounts` table : 
#

CREATE TABLE `discounts` (
  `discount_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `discount_code` bigint(100) DEFAULT NULL,
  `discount_type` varchar(200) DEFAULT NULL,
  `discount_desc` varchar(200) DEFAULT NULL,
  `discount_percent` bigint(100) DEFAULT NULL,
  `discount_amount` bigint(100) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `generics` table : 
#

CREATE TABLE `generics` (
  `generic_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `generic_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`generic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `giftcards` table : 
#

CREATE TABLE `giftcards` (
  `giftcard_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `giftcard_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`giftcard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `invoice_counter` table : 
#

CREATE TABLE `invoice_counter` (
  `counter_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `counter_start` bigint(20) DEFAULT '0',
  `counter_end` bigint(20) DEFAULT '0',
  `last_invoice` bigint(20) DEFAULT '0',
  PRIMARY KEY (`counter_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `item_types` table : 
#

CREATE TABLE `item_types` (
  `item_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`item_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `journal_accounts` table : 
#

CREATE TABLE `journal_accounts` (
  `journal_account_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `journal_id` bigint(20) DEFAULT '0',
  `account_id` int(11) DEFAULT '0',
  `memo` varchar(700) DEFAULT '',
  `dr_amount` decimal(25,2) DEFAULT '0.00',
  `cr_amount` decimal(25,2) DEFAULT '0.00',
  PRIMARY KEY (`journal_account_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `journal_info` table : 
#

CREATE TABLE `journal_info` (
  `journal_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `txn_no` varchar(55) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `supplier_id` int(11) DEFAULT '0',
  `remarks` varchar(555) DEFAULT '',
  `book_type` varchar(20) DEFAULT '',
  `date_txn` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `payment_method_id` int(11) DEFAULT '0',
  `bank` varchar(10) DEFAULT NULL,
  `check_no` varchar(20) DEFAULT NULL,
  `check_date` date DEFAULT '0000-00-00',
  `ref_type` varchar(4) DEFAULT NULL,
  `ref_no` varchar(15) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `or_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`journal_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `locations` table : 
#

CREATE TABLE `locations` (
  `location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `order_status` table : 
#

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status` varchar(75) DEFAULT '',
  `order_description` varchar(555) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `other_sales_invoice` table : 
#

CREATE TABLE `other_sales_invoice` (
  `sales_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_inv_no` varchar(75) DEFAULT '',
  `sales_order_id` bigint(20) DEFAULT '0',
  `sales_order_no` varchar(75) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `journal_id` bigint(20) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `date_due` date DEFAULT '0000-00-00',
  `date_invoice` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `is_paid` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_journal_posted` bit(1) DEFAULT b'0',
  `ref_product_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `other_sales_invoice_items` table : 
#

CREATE TABLE `other_sales_invoice_items` (
  `sales_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_invoice_id` bigint(20) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `inv_price` decimal(20,2) DEFAULT '0.00',
  `inv_discount` decimal(20,2) DEFAULT '0.00',
  `inv_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `inv_tax_rate` decimal(20,2) DEFAULT '0.00',
  `inv_qty` decimal(20,2) DEFAULT NULL,
  `inv_line_total_price` decimal(20,2) DEFAULT '0.00',
  `inv_tax_amount` decimal(20,2) DEFAULT '0.00',
  `inv_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  `inv_notes` varchar(100) DEFAULT NULL,
  `dr_invoice_id` int(11) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  PRIMARY KEY (`sales_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

#
# Structure for the `payable_payments` table : 
#

CREATE TABLE `payable_payments` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(75) DEFAULT '',
  `supplier_id` bigint(20) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_paid_amount` decimal(20,2) DEFAULT '0.00',
  `date_paid` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_cancelled` datetime DEFAULT '0000-00-00 00:00:00',
  `cancelled_by_user` int(11) DEFAULT '0',
  `created_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `payable_payments_list` table : 
#

CREATE TABLE `payable_payments_list` (
  `payment_list_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_id` bigint(20) DEFAULT '0',
  `dr_invoice_id` bigint(20) DEFAULT '0',
  `payable_amount` decimal(20,2) DEFAULT '0.00',
  `payment_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`payment_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `payment_methods` table : 
#

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(100) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `po_attachments` table : 
#

CREATE TABLE `po_attachments` (
  `po_attachment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` bigint(20) DEFAULT '0',
  `orig_file_name` varchar(255) DEFAULT '',
  `server_file_directory` varchar(800) DEFAULT '',
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by_user` int(11) DEFAULT '0',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`po_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `po_messages` table : 
#

CREATE TABLE `po_messages` (
  `po_message_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` bigint(20) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `message` text,
  `date_posted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`po_message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `product_batch_inventory` table : 
#

CREATE TABLE `product_batch_inventory` (
  `product_key` varchar(100) NOT NULL,
  `product_id` bigint(20) DEFAULT '0',
  `batch_no` varchar(55) DEFAULT '',
  `exp_date` date DEFAULT '0000-00-00',
  `batch_exp_on_hand` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`product_key`),
  UNIQUE KEY `product_key` (`product_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `purchase_order` table : 
#

CREATE TABLE `purchase_order` (
  `purchase_order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(75) DEFAULT '',
  `terms` varchar(55) DEFAULT '',
  `duration` varchar(55) DEFAULT '',
  `deliver_to_address` varchar(755) DEFAULT '',
  `supplier_id` int(11) DEFAULT '0',
  `department_id` bigint(20) DEFAULT '0',
  `tax_type_id` int(11) DEFAULT '0',
  `contact_person` varchar(100) DEFAULT '',
  `remarks` varchar(155) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `approval_id` int(11) DEFAULT '2',
  `order_status_id` int(11) DEFAULT '1',
  `is_email_sent` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_approved` datetime DEFAULT '0000-00-00 00:00:00',
  `approved_by_user` int(11) DEFAULT '0',
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`purchase_order_id`),
  UNIQUE KEY `po_no` (`po_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `purchase_order_items` table : 
#

CREATE TABLE `purchase_order_items` (
  `po_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `po_price` decimal(20,2) DEFAULT '0.00',
  `po_discount` decimal(20,2) DEFAULT '0.00',
  `po_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `po_tax_rate` decimal(11,2) DEFAULT '0.00',
  `po_qty` decimal(20,2) DEFAULT '0.00',
  `po_line_total` decimal(20,2) DEFAULT '0.00',
  `tax_amount` decimal(20,2) DEFAULT '0.00',
  `non_tax_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`po_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `receivable_payments` table : 
#

CREATE TABLE `receivable_payments` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(20) DEFAULT '',
  `customer_id` int(11) DEFAULT NULL,
  `remarks` varchar(755) DEFAULT '',
  `total_paid_amount` decimal(20,2) DEFAULT '0.00',
  `date_paid` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_cancelled` datetime DEFAULT '0000-00-00 00:00:00',
  `cancelled_by_user` int(11) DEFAULT '0',
  `created_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `receivable_payments_list` table : 
#

CREATE TABLE `receivable_payments_list` (
  `payment_list_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_id` bigint(20) DEFAULT '0',
  `sales_invoice_id` bigint(20) DEFAULT '0',
  `receivable_amount` decimal(20,2) DEFAULT '0.00',
  `payment_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`payment_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `refcustomertype` table : 
#

CREATE TABLE `refcustomertype` (
  `refcustomertype_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `modified_by_user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`refcustomertype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `refproduct` table : 
#

CREATE TABLE `refproduct` (
  `refproduct_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `modified_by_user_id` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`refproduct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `rights_links` table : 
#

CREATE TABLE `rights_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_code` varchar(100) DEFAULT '',
  `link_code` varchar(20) DEFAULT NULL,
  `link_name` varchar(255) DEFAULT '',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

#
# Structure for the `sales_order` table : 
#

CREATE TABLE `sales_order` (
  `sales_order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `so_no` varchar(75) DEFAULT '',
  `customer_id` bigint(20) DEFAULT '0',
  `department_id` int(11) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `order_status_id` int(11) DEFAULT '1',
  `date_order` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`sales_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `sales_order_items` table : 
#

CREATE TABLE `sales_order_items` (
  `sales_order_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_order_id` bigint(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT NULL,
  `so_qty` decimal(20,2) DEFAULT '0.00',
  `so_price` decimal(20,2) DEFAULT '0.00',
  `so_discount` decimal(20,2) DEFAULT '0.00',
  `so_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `so_tax_rate` decimal(20,2) DEFAULT '0.00',
  `so_line_total_price` decimal(20,2) DEFAULT '0.00',
  `so_tax_amount` decimal(20,2) DEFAULT '0.00',
  `so_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  `exp_date` date DEFAULT NULL,
  `dr_invoice_id` int(11) DEFAULT NULL,
  `batch_no` varchar(55) DEFAULT '',
  PRIMARY KEY (`sales_order_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `salesperson` table : 
#

CREATE TABLE `salesperson` (
  `salesperson_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `acr_name` varchar(10) DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`salesperson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 PACK_KEYS=0;

#
# Structure for the `supplier_photos` table : 
#

CREATE TABLE `supplier_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT '0',
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Structure for the `suppliers` table : 
#

CREATE TABLE `suppliers` (
  `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(125) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `tin_no` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `tax_type_id` int(11) NOT NULL,
  `photo_path` varchar(500) NOT NULL,
  `total_payable_amount` decimal(19,2) NOT NULL,
  `posted_by_user` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `credit_limit` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

#
# Structure for the `tax_types` table : 
#

CREATE TABLE `tax_types` (
  `tax_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_type` varchar(155) DEFAULT '',
  `tax_rate` decimal(11,2) DEFAULT '0.00',
  `description` varchar(555) DEFAULT '',
  `is_default` bit(1) DEFAULT b'0',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`tax_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `units` table : 
#

CREATE TABLE `units` (
  `unit_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unit_code` bigint(20) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `unit_desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Structure for the `user_accounts` table : 
#

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT '',
  `user_pword` varchar(500) DEFAULT '',
  `user_lname` varchar(100) DEFAULT '',
  `user_fname` varchar(100) DEFAULT '',
  `user_mname` varchar(100) DEFAULT '',
  `user_address` varchar(155) DEFAULT '',
  `user_email` varchar(100) DEFAULT '',
  `user_mobile` varchar(100) DEFAULT '',
  `user_telephone` varchar(100) DEFAULT '',
  `user_bdate` date DEFAULT '0000-00-00',
  `user_group_id` int(11) DEFAULT '0',
  `photo_path` varchar(555) DEFAULT '',
  `file_directory` varchar(666) DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Structure for the `user_group_rights` table : 
#

CREATE TABLE `user_group_rights` (
  `user_rights_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) DEFAULT '0',
  `link_code` varchar(20) DEFAULT '',
  PRIMARY KEY (`user_rights_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

#
# Structure for the `user_groups` table : 
#

CREATE TABLE `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group` varchar(135) DEFAULT '',
  `user_group_desc` varchar(500) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Definition for the `get_product_qty_per_batch` function : 
#

CREATE DEFINER = 'root'@'localhost' FUNCTION `get_product_qty_per_batch`(
        p_batch_no VARCHAR(55),
        p_product_id INTEGER(11),
        p_exp_date DATE
    )
    RETURNS decimal(20,0)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
	DECLARE vOnHand DECIMAL;
	
    SET vOnHand=(SELECT 

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
                    WHERE dii.product_id=p_product_id AND dii.batch_no=p_batch_no 
                    AND dii.exp_date=p_exp_date
                    AND di.is_active=TRUE AND di.is_deleted=FALSE
                    GROUP BY dii.product_id,dii.`batch_no`,dii.exp_date


 					UNION ALL


  					SELECT aii.product_id,aii.batch_no,aii.exp_date,
                    CONCAT_WS('-',aii.batch_no,aii.product_id,aii.exp_date)as unq_id,
                    SUM(aii.adjust_qty) as receive_qty
                    FROM adjustment_items as aii
                    INNER JOIN adjustment_info as ai
                    ON aii.adjustment_id=ai.adjustment_id
                    WHERE ai.adjustment_type='IN' AND aii.product_id=product_id
                    AND aii.batch_no=p_batch_no AND aii.exp_date=p_exp_date
					AND ai.is_active=TRUE AND ai.is_deleted=FALSE
                    GROUP BY aii.product_id,aii.batch_no,aii.exp_date) as inQ

                    GROUP By inQ.product_id,inQ.batch_no,inQ.exp_date




                    )as rc


                    LEFT JOIN


                    (SELECT sii.product_id,
                    CONCAT_WS('-',sii.batch_no,sii.product_id,sii.exp_date)as unq_id,
                    SUM(sii.inv_qty) as out_qty
                    FROM sales_invoice_items as sii
                    INNER JOIN sales_invoice as si ON sii.sales_invoice_id=si.sales_invoice_id
                    WHERE sii.product_id=p_product_id AND sii.batch_no=p_batch_no 
                    AND sii.exp_date=p_exp_date AND si.is_active=TRUE AND si.is_deleted=FALSE
                    GROUP BY sii.product_id,sii.batch_no,sii.exp_date) as sinv

                    ON rc.unq_id=sinv.unq_id

                    LEFT JOIN

                    (  SELECT iss.product_id,
                    CONCAT_WS('-',iss.batch_no,iss.product_id,iss.exp_date)as unq_id,
                    SUM(iss.issue_qty) as out_qty
                    FROM issuance_items as iss
                    INNER JOIN issuance_info as iin ON iss.issuance_id=iin.issuance_id
                    WHERE iss.product_id=p_product_id AND iss.batch_no=p_batch_no 
                    AND iss.exp_date=p_exp_date AND iin.is_active=TRUE AND iin.is_deleted=FALSE
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
                    WHERE ai.adjustment_type='OUT' AND aii.product_id=p_product_id 
                    AND aii.batch_no=p_batch_no AND aii.exp_date=p_exp_date
					AND ai.is_active=TRUE AND ai.is_deleted=FALSE
                    GROUP BY aii.product_id,aii.batch_no,aii.exp_date
                    )as aoQ

                    ON rc.unq_id=aoQ.unq_id);




  RETURN IFNULL(vOnHand,0);
END;

#
# Definition for the `reset_tables` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `reset_tables`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
	TRUNCATE `purchase_order`;
    TRUNCATE `purchase_order_items`;
    
    TRUNCATE `delivery_invoice`;
    TRUNCATE `delivery_invoice_items`;
    
    TRUNCATE `issuance_info`;
    TRUNCATE `issuance_items`;
    
    TRUNCATE `adjustment_info`;
    TRUNCATE `adjustment_items`;
    
    TRUNCATE `sales_order`;
    TRUNCATE `sales_order_items`;
    
    TRUNCATE `sales_invoice`;
    TRUNCATE `sales_invoice_items`;
    
    TRUNCATE `receivable_payments`;
    TRUNCATE `receivable_payments_list`;
    
    TRUNCATE `payable_payments`;
    TRUNCATE `payable_payments_list`;
    
    TRUNCATE `product_batch_inventory`;
    
    
    TRUNCATE `po_attachments`;
    TRUNCATE `po_messages`;
    
    
END;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;