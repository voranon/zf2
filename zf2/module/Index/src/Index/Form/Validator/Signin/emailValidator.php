<?php

namespace Index\Form\Validator\Signin;

use Zend\Validator\Db\AbstractDb;

class emailValidator extends AbstractDb{


	const NOT_EXIST  ='not_exist';
	const INVALID    ='invalid';

	protected $messageTemplates = array(
			self::NOT_EXIST  => "Your email does not exist in our system",
			self::INVALID    => "Invalid email or password"
	);

	public function isValid($value,$context=null){

		$this->setValue($value);//to insert tested value to the failure message

		$db = $this->getAdapter();


		$exist_query="select *
					  from members
					  where email='".$value."'";

		$result     = $db->query($exist_query,$db::QUERY_MODE_EXECUTE);
		$exist      = $result->count();

		$valid_query="select *
					  from members
					  where email ='".$value."'
					  and password = md5('".$context['password']."')";

		$result     = $db->query($valid_query,$db::QUERY_MODE_EXECUTE);
		$valid      = $result->count();
		//$result->

		if ( !$exist ) {
			$this->error(self::NOT_EXIST);
			return false;
		}else if( !$valid ){
			$this->error(self::INVALID);
			return false;
		}

		return true;

	}
}

?>