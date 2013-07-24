<?php

namespace Index\Form\Validator\Signup;

use Zend\Validator\AbstractValidator;

class cpasswordValidator extends AbstractValidator
{
	const MISSMATCH = 'missmatch';

	protected $messageTemplates = array(
			self::MISSMATCH => "Password is missmatch"
	);

	public function isValid($value,$context=null)
	{
		$this->setValue($value);

		if ($value != $context['password']) {
			$this->error(self::MISSMATCH);
			return false;
		}

		return true;
	}

}

?>