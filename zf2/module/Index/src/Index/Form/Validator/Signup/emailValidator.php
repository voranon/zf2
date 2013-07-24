<?php

namespace Index\Form\Validator\Signup;

use Zend\Validator\Db\AbstractDb;

class emailValidator extends AbstractDb
{

	const ALREADY_EXIST  ='ALREADY_EXIST';
	const INVALID_FORMAT ='INVALID_FORMAT';



	protected $messageTemplates = array(

		self::INVALID_FORMAT => "'%value%' has invalid email formats",
		self::ALREADY_EXIST  => "'%value%' has already been used",
	);


	public function isValid($value){

		$this->setValue($value);//to insert tested value to the failure message

		$db = $this->getAdapter();

		$exist_query="select *
					  from members
					  where email='".$value."'";

		$result     = $db->query($exist_query,$db::QUERY_MODE_EXECUTE);
		$exist      = $result->count();

		if($exist){
			$this->error(self::ALREADY_EXIST);
			return false;
		}


		if( !preg_match( '/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/',$value) )
		{
			$this->error(self::INVALID_FORMAT);
			return false;
		}



		return true;

	}

}

?>