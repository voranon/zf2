<?php
namespace Index\Model;

// Add these import statements

class Member{

	private $member_id;
	private $email;
	private $password;
	private $member_type_id;
	private $sort_by;
	private $created_date;
	private $last_modified;

	public function __construct(){

	}

	public function exchangeArray($data)
    {
        $this->member_id     		=    (		isset(  $data['member_id']) 			) ? 	$data['member_id'] 			: 	null;
        $this->email      			=    (		isset(  $data['email']) 				) ? 	$data['email'] 			    : 	null;
        $this->password      		=    (		isset(  $data['password']) 				) ? 	$data['password'] 			: 	null;
        $this->member_type_id       =    (		isset(  $data['member_type_id']) 		) ? 	$data['member_type_id'] 	: 	null;
        $this->sort_by      		=    (		isset(  $data['sort_by']) 				) ? 	$data['sort_by'] 			: 	null;
        $this->created_date      	=    (		isset(  $data['created_date']) 			) ? 	$data['created_date'] 		: 	null;
        $this->last_modified      	=    (		isset(  $data['last_modified']) 		) ? 	$data['last_modified'] 		: 	null;

    }


    public function get_member_id(){
		return $this->member_id;
    }

    public function get_email(){
		return $this->email;
    }

    public function get_password(){
		return $this->password;
    }

    public function get_member_type_id(){
		return $this->member_type_id;
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

    ////////////////////////////////

    public function set_member_id($member_id){
    	$this->member_id = $member_id;
    }

    public function set_email($email){
    	$this->email  = $email;
    }

    public function set_password($password){
    	$this->password  = $password;
    }

    public function set_member_type_id($member_type_id){
    	$this->member_type_id = $member_type_id;
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
