<?php

namespace Index\Form\Validator\Signup;

use Zend\Validator\AbstractValidator;

class cemailValidator extends AbstractValidator
{
	const MISSMATCH = 'missmatch';

	protected $messageTemplates = array(
			self::MISSMATCH => "'%value%' is missmatch"
	);

	public function isValid($value,$context=null)
	{
		$this->setValue($value);

		if ($value != $context['email']) {
			$this->error(self::MISSMATCH);
			return false;
		}

		return true;
	}

}

?>