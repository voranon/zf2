<?php
namespace Index\Form;

use Index\Form\Validator\Signup\emailValidator;
use Index\Form\Validator\Signup\cemailValidator;
use Index\Form\Validator\Signup\cpasswordValidator;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator;




use Zend\InputFilter\Factory as InputFactory;


// Value is required and can't be empty

class SignupForm extends Form
{
    public function __construct($name = null,$dbAdapter)
    {

        parent::__construct($name);
        $this->setAttribute('method', 'post');
        $this->setAttribute('autocomplete', "off" );

        $email = new Element('email');

        $email->setAttributes(array(
        						'name'		  =>'email',
        						'type'		  =>'email',
           						'placeholder' =>'Email',
        					    'autocomplete'=>'off'
        					 ));

        $cemail = new Element('cemail');
        $cemail->setAttributes(array(
        						'name'		 =>'cemail',
        						'type'		 =>'email',
        						'placeholder'=>'Confirm Email',
        						'autocomplete'=>'off'
        					  ));

        $password = new Element('password');
        $password->setAttributes(array(
        						'name'		 =>'password',
        						'type'		 =>'password',
        						'placeholder'=>'Password',
        						'autocomplete'=>'off'
        						));

        $cpassword = new Element('cpassword');
        $cpassword->setAttributes(array(
        						'name'		 =>'cpassword',
        						'type'		 =>'password',
        						'placeholder'=>'Confirm Password',
        						'autocomplete'=>'off'
        						));

        $submit   = new Element('submit');
        $submit->setAttributes(array(
        						'name'		 =>'submit',
        						'type'		 =>'submit',
        						'value'		 =>'Sign Up',

        						));

        $this->add($email);
        $this->add($cemail);
        $this->add($password);
        $this->add($cpassword);
        $this->add($submit);



        $emailInput = new Input('email');
        $emailValidator = new emailValidator(
								        		array(
								        				'table' => 'members',
								           				'field' => 'email',
								        				'adapter' => $dbAdapter
								        		)
        									);


		$emailInput->getValidatorChain()->addValidator($emailValidator);



		$cemailInput = new Input('cemail');
		$cemailInput->getValidatorChain()->addValidator(new cemailValidator());

		$passwordInput = new Input('password');
		$passwordInput->getValidatorChain()->addValidator(new Validator\StringLength(8));

		$cpasswordInput = new Input('cpassword');
		$cpasswordInput->getValidatorChain()->addValidator(new cpasswordValidator());

		$inputFilter = new InputFilter();
		$inputFilter->add($emailInput)
					->add($cemailInput)
					->add($passwordInput)
					->add($cpasswordInput);




		$this->setInputFilter($inputFilter);



    }
}