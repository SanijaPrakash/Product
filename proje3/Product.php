<?php
/**
 * Created by Sanija K
 * User: vinam
 * Date: 11/3/19
 * Time: 9:00 AM
 */
include "Database.php";

class Product extends Database {

	var $id;
	var $productname;
	var $pseudoname;
	var $image;
	var $price;
	var $date;
	var $weigh;

	 function __construct(){

		parent::__construct();
	}
}
?>