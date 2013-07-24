<?php
namespace Index\Model;

use Zend\Crypt\PublicKey\Rsa\PublicKey;

// Add these import statements

class Property{

	private $property_id;
	private $property_name;

	private $property_street;
	private $property_city;
	private $property_state;
	private $property_zip;
	private $property_country;

	private $property_mls;
	private $property_style;
	private $property_squarefeet;
	private $property_lotsize;
	private $property_yearbuilt;
	private $property_lastremodel;
	private $property_parking;
	private $property_hoa;

	private $property_listingprice;
	private $property_initimprove;
	private $property_purchaseprice;
	private $property_first_loanamount;
	private $property_first_loantype;
	private $property_first_interestrate;
	private $property_first_payment_frequency;
	private $property_first_term;
	private $property_first_interestonly_term;
	private $property_second_loanamount;
	private $property_second_loantype;
	private $property_second_interestrate;
	private $property_second_payment_frequency;
	private $property_second_term;
	private $property_second_interestonly_term;

	private $member_id;
	private $sort_by;
	private $created_date;
	private $last_modified;

	private $buyingcost_items;

	public function __construct(Property $property=null){
		if($property){

			$this->property_id 						= $property->get_property_id();
			$this->property_name 					= $property->get_property_name();

			$this->property_street  				= $property->get_property_street();
			$this->property_city    				= $property->get_property_city();
			$this->property_state   				= $property->get_property_state();
			$this->property_zip     				= $property->get_property_zip();
			$this->property_country 				= $property->get_property_country();

			$this->property_mls 					= $property->get_property_mls();
			$this->property_style   				= $property->get_property_style();
			$this->property_squarefeet  			= $property->get_property_squarefeet();
			$this->property_lotsize     			= $property->get_property_lotsize();
			$this->property_yearbuilt   			= $property->get_property_yearbuilt();
			$this->property_lastremodel 			= $property->get_property_lastremodel();
			$this->property_parking     			= $property->get_property_parking();
			$this->property_hoa         			= $property->get_property_hoa();

			$this->property_listingprice 			= $property->get_property_listingprice();
			$this->property_initimprove 			= $property->get_property_initimprove();
			$this->property_purchaseprice 			= $property->get_property_purchaseprice();
			$this->property_first_loanamount 		= $property->get_property_first_loanamount();
			$this->property_first_loantype      	= $property->get_property_first_loantype();
			$this->property_first_interestrate  	= $property->get_property_first_interestrate();
			$this->property_first_payment_frequency = $property->get_property_first_payment_frequency();
			$this->property_first_term 	        	= $property->get_property_first_term();
			$this->property_first_interestonly_term = $property->get_property_first_interestonly_term();
			$this->property_second_loanamount 		= $property->get_property_second_loanamount();
			$this->property_second_loantype      	= $property->get_property_second_loantype();
			$this->property_second_interestrate  	= $property->get_property_second_interestrate();
			$this->property_second_payment_frequency= $property->get_property_second_payment_frequency();
			$this->property_second_term 	        = $property->get_property_second_term();
			$this->property_second_interestonly_term= $property->get_property_second_interestonly_term();

			$this->member_id        	= $property->get_member_id();
			$this->sort_by          	= $property->get_sort_by();
			$this->created_date     	= $property->get_created_date();
			$this->last_modified    	= $property->get_last_modified();
		}

	}

	public function exchangeArray($data)
    {
        $this->property_id     					=    (	isset(  $data['property_id']) 						) ? 	$data['property_id'] 						: 	null;
        $this->property_name     				=    (	isset(  $data['property_name']) 					) ? 	$data['property_name'] 						: 	null;

        $this->property_street     				=    (	isset(  $data['property_street']) 					) ? 	$data['property_street'] 					: 	null;
        $this->property_city     				=    (	isset(  $data['property_city']) 					) ? 	$data['property_city'] 						: 	null;
        $this->property_state     				=    (	isset(  $data['property_state']) 					) ? 	$data['property_state'] 					: 	null;
        $this->property_zip     				=    (	isset(  $data['property_zip']) 		    			) ? 	$data['property_zip'] 						: 	null;
        $this->property_country     			=    (	isset(  $data['property_country']) 					) ? 	$data['property_country'] 					: 	null;

        $this->property_mls     				=    (	isset(  $data['property_mls']) 		    			) ? 	$data['property_mls'] 	     				: 	null;
        $this->property_style     				=    (	isset(  $data['property_style']) 					) ? 	$data['property_style']      				: 	null;
        $this->property_squarefeet  			=    (  isset(  $data['property_squarefeet'])   			) ? 	$data['property_squarefeet'] 				: 	null;
        $this->property_lotsize     			=    (  isset(  $data['property_lotsize'])      			) ? 	$data['property_lotsize'] 	 				: 	null;
        $this->property_yearbuilt   			=    (  isset(  $data['property_yearbuilt'])    			) ? 	$data['property_yearbuilt']  				: 	null;
        $this->property_lastremodel 			=    (  isset(  $data['property_lastremodel'])  			) ? 	$data['property_lastremodel'] 				: 	null;
        $this->property_parking     			=    (  isset(  $data['property_parking'])      			) ? 	$data['property_parking']   				: 	null;
        $this->property_hoa         			=    (  isset(  $data['property_hoa'])          			) ? 	$data['property_hoa']       				: 	null;

		$this->property_listingprice 			=    (  isset(  $data['property_listingprice']) 			) ? 	$data['property_listingprice']       		: 	null;
		$this->property_initimprove 			=    (  isset(  $data['property_initimprove']) 				) ? 	$data['property_initimprove']       		: 	null;
		$this->property_purchaseprice 			=    (  isset(  $data['property_purchaseprice']) 			) ? 	$data['property_purchaseprice']       		: 	null;
		$this->property_first_loanamount        =    (  isset(  $data['property_first_loanamount']) 		) ? 	$data['property_first_loanamount']          : 	null;
		$this->property_first_loantype          =    (  isset(  $data['property_first_loantype']) 			) ? 	$data['property_first_loantype']       	    : 	null;
		$this->property_first_interestrate      =    (  isset(  $data['property_first_interestrate']) 		) ? 	$data['property_first_interestrate']        : 	null;
		$this->property_first_payment_frequency =    (  isset(  $data['property_first_payment_frequency']) 	) ? 	$data['property_first_payment_frequency']   : 	null;
		$this->property_first_term              =    (  isset(  $data['property_first_term']) 				) ? 	$data['property_first_term']       		    : 	null;
		$this->property_first_interestonly_term =    (  isset(  $data['property_first_interestonly_term']) 	) ? 	$data['property_first_interestonly_term']   : 	null;
		$this->property_second_loanamount       =    (  isset(  $data['property_second_loanamount']) 	  	) ? 	$data['property_second_loanamount']       	: 	null;
		$this->property_second_loantype         =    (  isset(  $data['property_second_loantype']) 			) ? 	$data['property_second_loantype']       	: 	null;
		$this->property_second_interestrate     =    (  isset(  $data['property_second_interestrate']) 		) ? 	$data['property_second_interestrate']       : 	null;
		$this->property_second_payment_frequency=    (  isset(  $data['property_second_payment_frequency']) ) ? 	$data['property_second_payment_frequency']  : 	null;
		$this->property_second_term             =    (  isset(  $data['property_second_term'])				) ? 	$data['property_second_term']       		: 	null;
		$this->property_second_interestonly_term=    (  isset(  $data['property_second_interestonly_term']) ) ? 	$data['property_second_interestonly_term']  : 	null;


        $this->member_id            = 	 (		isset(  $data['member_id']) 		    ) ? 	$data['member_id'] 	        : 	null;
        $this->sort_by      		=    (		isset(  $data['sort_by']) 				) ? 	$data['sort_by'] 			: 	null;
        $this->created_date      	=    (		isset(  $data['created_date']) 			) ? 	$data['created_date'] 		: 	null;
        $this->last_modified      	=    (		isset(  $data['last_modified']) 		) ? 	$data['last_modified'] 		: 	null;



    }


    public function get_property_id(){
		return $this->property_id;
    }

    public function get_property_name(){
		return $this->property_name;
    }

    public function get_property_street(){
    	return $this->property_street;
    }

    public function get_property_city(){
    	return $this->property_city;
    }

    public function get_property_state(){
    	return $this->property_state;
    }

    public function get_property_zip(){
    	return $this->property_zip;
    }

    public function get_property_country(){
    	return $this->property_country;
    }

    public function get_property_mls(){
    	return $this->property_mls;
    }

    public function get_property_style(){
    	return $this->property_style;
    }

    public function get_property_squarefeet(){
    	return $this->property_squarefeet;
    }

    public function get_property_lotsize(){
    	return $this->property_lotsize;
    }

    public function get_property_yearbuilt(){
    	return $this->property_yearbuilt;
    }

    public function get_property_lastremodel(){
    	return $this->property_lastremodel;
    }

    public function get_property_parking(){
    	return $this->property_parking;
    }

    public function get_property_hoa(){
    	return $this->property_hoa;
    }

    public function get_property_listingprice(){
    	return $this->property_listingprice;
    }

    public function get_property_initimprove(){
    	return $this->property_initimprove;
    }

    public function get_property_purchaseprice(){
    	return $this->property_purchaseprice;
    }

    public function get_property_first_loanamount(){
    	return $this->property_first_loanamount;
    }

    public function get_property_first_loantype(){
    	return $this->property_first_loantype;
    }

    public function get_property_first_interestrate(){
    	return $this->property_first_interestrate;
    }

    public function get_property_first_payment_frequency(){
    	return $this->property_first_payment_frequency;
    }

    public function get_property_first_term(){
    	return $this->property_first_term;
    }

    public function get_property_first_interestonly_term(){
    	return $this->property_first_interestonly_term;
    }

    public function get_property_second_loanamount(){
    	return $this->property_second_loanamount;
    }

    public function get_property_second_loantype(){
    	return $this->property_second_loantype;
    }

    public function get_property_second_interestrate(){
    	return $this->property_second_interestrate;
    }

    public function get_property_second_payment_frequency(){
    	return $this->property_second_payment_frequency;
    }

    public function get_property_second_term(){
    	return $this->property_second_term;
    }

    public function get_property_second_interestonly_term(){
    	return $this->property_second_interestonly_term;
    }

    public function get_member_id(){
    	return $this->member_id;
    }

    public function get_sort_by(){
    	return $this->sort_by;
    }

    public function get_created_date(){
    	return $this->created_date;
    }

    public function get_last_modified(){
    	return $this->last_modified;
    }

    public function get_buyingcost_items(){
    	return $this->buyingcost_items;
    }



    ////////////////////////////////

    public function set_property_id($property_id){
    	$this->property_id = $property_id;
    }

    public function set_property_name($property_name){
    	$this->property_name  = $property_name;
    }

    public function set_property_street($property_street){
    	$this->property_street  = $property_street;
    }

    public function set_property_city($property_city){
    	$this->property_city  = $property_city;
    }

    public function set_property_state($property_state){
    	$this->property_state  = $property_state;
    }

    public function set_property_zip($property_zip){
    	$this->property_zip  = $property_zip;
    }

    public function set_property_country($property_country){
    	$this->property_country  = $property_country;
    }

    public function set_property_mls($property_mls){
    	$this->property_mls = $property_mls;
    }

    public function set_property_style($property_style){
    	$this->property_style = $property_style;
    }

    public function set_property_squarefeet($property_squarefeet){
       	$this->property_squarefeet = $property_squarefeet;
    }

    public function set_property_lotsize($property_lotsize){
    	$this->property_lotsize = $property_lotsize;
    }

    public function set_property_yearbuilt($property_yearbuilt){
    	$this->property_yearbuilt = $property_yearbuilt;
    }

    public function set_property_lastremodel($property_lastremodel){
    	$this->property_lastremodel = $property_lastremodel;
    }

    public function set_property_parking($property_parking){
    	$this->property_parking = $property_parking;
    }

    public function set_property_hoa($property_hoa){
    	$this->property_hoa = $property_hoa;
    }

    public function set_property_listingprice($property_listingprice){
    	$this->property_listingprice = $property_listingprice;
    }

    public function set_property_initimprove($property_initimprove){
    	$this->property_initimprove = $property_initimprove;
    }

    public function set_property_purchaseprice($property_purchaseprice){
    	$this->property_purchaseprice = $property_purchaseprice;
    }

    public function set_property_first_loanamount($property_first_loanamount){
    	$this->property_first_loanamount = $property_first_loanamount;
    }

    public function set_property_first_loantype($property_first_loantype){
    	$this->property_first_loantype = $property_first_loantype;
    }

    public function set_property_first_interestrate($property_first_interestrate){
		$this->property_first_interestrate = $property_first_interestrate;
    }

    public function set_property_first_payment_frequency($property_first_payment_frequency){
    	$this->property_first_payment_frequency = $property_first_payment_frequency;
    }

    public function set_property_first_term($property_first_term){
    	$this->property_first_term = $property_first_term;
    }

    public function set_property_first_interestonly_term($property_first_interestonly_term){
    	$this->property_first_interestonly_term = $property_first_interestonly_term;
    }

    public function set_property_second_loanamount($property_second_loanamount){
    	$this->property_second_loanamount = $property_second_loanamount;
    }

    public function set_property_second_loantype($property_second_loantype){
    	$this->property_second_loantype = $property_second_loantype;
    }

    public function set_property_second_interestrate($property_second_interestrate){
    	$this->property_second_interestrate = $property_second_interestrate;
    }

    public function set_property_second_payment_frequency($property_second_payment_frequency){
    	$this->property_second_payment_frequency = $property_second_payment_frequency;
    }

    public function set_property_second_term($property_second_term){
    	$this->property_second_term = $property_second_term;
    }

    public function set_property_second_interestonly_term($property_second_interestonly_term){
    	$this->property_second_interestonly_term = $property_second_interestonly_term;
    }

    public function set_member_id($member_id){
    	$this->member_id  = $member_id;
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

    public function set_buyingcost_items($buyingcost_items){
    	$this->buyingcost_items = $buyingcost_items;
    }


    ///////////////////

    public function add_buyingcost_item(Propertybuyingcostitem $buyingcost_item){
		$this->buyingcost_items[] = $buyingcost_item;
    }




}
