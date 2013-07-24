<?php
namespace Index\Controller;

use Index\Model\MyPaydateCalculator;

use Index\Model\Member;

use Zend\Session\Container;


use Zend\Mvc\Controller\AbstractActionController;

use Index\Form\SignupForm;
use Index\Form\SigninForm;


use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;


class IndexController extends AbstractActionController
{


	public function __construct(){


	}

	public function onDispatch( \Zend\Mvc\MvcEvent $e )
    {
    //


    	return parent::onDispatch( $e );
    }

	public function indexAction(){


		$db = $this->getServiceLocator()->get('my_index_db_adapter');
		$form = new SigninForm('Signin',$db);

		$request = $this->getRequest();
		if( $request->isPost($request->getPost()) ){

			$form->setData($request->getPost());

			if($form->isValid($request->getPost())){

				$sm = $this->getServiceLocator();
				$this->memberTable = $sm->get('Index\Model\MemberTable');

				$this->itemTable = $sm->get('Index\Model\ItemTable');

				$timeout = $this->itemTable->get_Item_value('session','timeout'); // In seconds

				$fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

				$user_session = new Container('user');

				$user_session->email = $request->getPost()->email;
				$user_session->id    = $this->memberTable->getId( $request->getPost()->email );
				$user_session->last_active = time();
				$user_session->fingerprint = $fingerprint;
				$user_session->isloggedin = true;

				$user_session->tab 			='property_tab'; // always property_tab for first version

				$propertyTable = $sm->get('Index\Model\PropertyTable');
				$rowset    = $propertyTable->getMemberProperties( $user_session->id );
				if( count($rowset) !=0 ){
					$property = $rowset->current();
					$user_session->property_id 	= $property->get_property_id();
				}else{
					$user_session->property_id 	= 0;
				}



				return $this->redirect()->toRoute('member');


			}

		}

		return array('form' => $form);
	}



	public function signupAction(){

		$db = $this->getServiceLocator()->get('my_index_db_adapter');
		$form = new SignupForm('Signup',$db);

		$member = new Member();

		$request = $this->getRequest();
		if( $request->isPost() ){


			$member = new Member();


			$form->setData( $request->getPost() );

			if($form->isValid( $request->getPost() )){

				// pull data from form to member object


				$member->exchangeArray($form->getData());
				$md5_password = md5( $member->get_password() );
				$member->set_password( $md5_password );


				$sm = $this->getServiceLocator();
				$this->memberTable = $sm->get('Index\Model\MemberTable');
				$this->memberTable->saveMember($member);

				$this->itemTable = $sm->get('Index\Model\ItemTable');

				$from 		= $this->itemTable->get_Item_text('confirm_email','from');
				$subject 	= $this->itemTable->get_Item_text('confirm_email','subject');
				$content 	= $this->itemTable->get_Item_text('confirm_email','content');

				$message = new Message();
				$message->addTo($member->get_email())
						->addFrom($from)
						->setSubject($subject)
						->setBody($content);

				// Setup SMTP transport using LOGIN authentication

				$config = $sm->get('config');
				$smtp   = $config['smtp'];

				$transport = new SmtpTransport();
				$options   = new SmtpOptions(array(
						'name'              => $smtp['name'],
						'host'              => $smtp['host'],
						'connection_class'  => 'login',
						'connection_config' => array(
								'username'  => $smtp['username'],
								'password'  => $smtp['password'],
						),
				));
				$transport->setOptions($options);
				$transport->send($message);


				/// set session
				$this->itemTable = $sm->get('Index\Model\ItemTable');

				$timeout = $this->itemTable->get_Item_value('session','timeout'); // In seconds

				$fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

				$user_session = new Container('user');

				$user_session->email = $request->getPost()->email;
				$user_session->id    = $this->memberTable->getId( $request->getPost()->email );
				$user_session->last_active = time();
				$user_session->fingerprint = $fingerprint;
				$user_session->isloggedin = true;


				return $this->redirect()->toRoute('member');

			}
		}
		return array('form' => $form);
	}

}