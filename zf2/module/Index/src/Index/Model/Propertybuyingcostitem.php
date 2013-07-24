<?php
namespace Index\Model;


class Propertybuyingcostitem{

	private $property_buyingcost_item_id;
	private $property_id;
	private $buyingcost_item_id;
	private $property_buyingcost_item_amount;
	private $sort_by;
	private $created_date;
	private $last_modified;

	public function __construct(){

	}

	public function exchangeArray($data)// all $data element need to be match with table's column name
	{
		$this->property_buyingcost_item_id     	=    (	isset(  $data['property_buyingcost_item_id']) 	  )? $data['property_buyingcost_item_id'] 		: null;
		$this->property_id     					=    (	isset(  $data['property_id']) 					  )? $data['property_id'] 				 		: null;
		$this->buyingcost_item_id     			=    (	isset(  $data['buyingcost_item_id']) 			  )? $data['buyingcost_item_id'] 		 		: null;
		$this->property_buyingcost_item_amount  =    (	isset(  $data['property_buyingcost_item_amount']) )? $data['property_buyingcost_item_amount'] 	: null;
		$this->sort_by      					=    (	isset(  $data['sort_by']) 						  )? $data['sort_by'] 							: null;
		$this->created_date      				=    (	isset(  $data['created_date']) 					  )? $data['created_date'] 						: null;
		$this->last_modified      				=    (	isset(  $data['last_modified']) 				  )? $data['last_modified'] 					: null;
	}

	public function get_property_buyingcost_item_id(){
		return $this->property_buyingcost_item_id;
	}

	public function get_property_id(){
		return $this->property_id;
	}

	public function get_buyingcost_item_id(){
		return $this->buyingcost_item_id;
	}

	public function get_property_buyingcost_item_amount(){
		return $this->property_buyingcost_item_amount;
	}

	public function get_sort_by(){
		return $this->sort_by;
	}

	public function get_created_date(){
		return $this->created_date.'-';
	}

	public function get_last_modified(){
		return $this->last_modified;
	}

	//////////////////////////

	public function set_property_buyingcost_item_id($property_buyingcost_item_id){
		$this->property_buyingcost_item_id = $property_buyingcost_item_id;
	}

	public function set_property_id($property_id){
		$this->property_id = $property_id;
	}

	public function set_buyingcost_item_id($buyingcost_item_id){
		$this->buyingcost_item_id = $buyingcost_item_id;
	}

	public function set_property_buyingcost_item_amount($property_buyingcost_item_amount){
		$this->property_buyingcost_item_amount = $property_buyingcost_item_amount;
	}

	public function set_sort_by($sort_by){
		$this->sort_by = $sort_by;
	}

	public function set_created_date($created_date){
		$this->created_date = $created_date;
	}

	public function set_last_modified($last_modified){
		$this->last_modified = $last_modified;
	}

}

?>