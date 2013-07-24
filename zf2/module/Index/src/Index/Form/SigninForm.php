<?php

namespace Index\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

use Zend\Validator\Db\RecordExists;


use Index\Form\Validator\Signin\emailValidator;

class SigninForm extends Form{


	public function __construct($name = null,$dbAdapter)
	{

		parent::__construct($name);
		$this->setAttribute('method', 'post');

		$email = new Element('email');
		$email->setAttributes(array(
				'name'		  =>'email',
				'type'		  =>'email',
				'placeholder' =>'Email',
				'autocomplete'=>'off'
		));

		$password = new Element('password');
		$password->setAttributes(array(
				'name'		 =>'password',
				'type'		 =>'password',
				'placeholder'=>'Password',
				'autocomplete'=>'off'
		));

		$submit   = new Element('submit');
		$submit->setAttributes(array(
				'name'		 =>'submit',
				'type'		 =>'submit',
				'value'		 =>'Sign In',

		));

		$this->add($email);
		$this->add($password);
		$this->add($submit);


		$emailInput = new Input('email');

		$emailValidator = new emailValidator(array(
						'field'	  => 'username',
				        'schema'  => 'zf2',
        				'adapter' => $dbAdapter
        		));

		$emailInput->getValidatorChain()->addValidator($emailValidator);


		$passwordInput = new Input('password');
		$passwordInput->getValidatorChain()->addValidator(new Validator\StringLength(8));

		$inputFilter = new InputFilter();

		$inputFilter->add($emailInput)
					->add($passwordInput);

		$this->setInputFilter($inputFilter);





	}



}

?>