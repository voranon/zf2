<?php
namespace Index\Controller;



use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Index\Model\Property;




class MemberController extends AbstractActionController
{

	private $properties;

	public function __construct(){


	}

	public function onDispatch( \Zend\Mvc\MvcEvent $e )
	{
			//  session checking
			$sm = $this->getServiceLocator();
			$this->itemTable = $sm->get('Index\Model\ItemTable');

			$layout = $this->layout();
			$layout->setTemplate('layout/member');



		    $timeout = $this->itemTable->get_Item_value('session','timeout'); // In seconds
		    $fingerprint = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);


			$user_session = new Container('user');

			if (
					   ( isset( $user_session->last_active ) && $user_session->last_active < (time()-$timeout) )
					|| ( isset( $user_session->fingerprint ) && $user_session->fingerprint != $fingerprint)
					|| ( $user_session->isloggedin != true)
				)
			{
				//setcookie(session_name(), '', time()-3600, '/');  unset cookie if need
				unset($user_session);
				session_destroy();
				return $this->redirect()->toRoute('index');
			}

			$user_session->last_active = time();
			$user_session->fingerprint = $fingerprint;

			// end session checking

			$propertyTable = $sm->get('Index\Model\PropertyTable');

			$rowset    = $propertyTable->getMemberProperties( $user_session->id );
			$i=0;
			foreach ($rowset as $property) {
				 $this->properties[$i]['property_name'] 		= $property->get_property_name();
				 $this->properties[$i++]['property_id']   		= $property->get_property_id();
			}


			$this->layout()->properties =  $this->properties;

			return parent::onDispatch( $e );
	}


	public function propertyAction(){
		//echo $user_session->email;
	}

	public function unitsAction(){
		//echo $user_session->email;
	}

	public function photosAction(){
		//echo $user_session->email;
	}

	public function videosAction(){
		//echo $user_session->email;
	}

	public function reportsAction(){

	}

	public function accountAction(){

	}

	public function logoutAction(){

		unset($user_session);
		session_destroy();
		return $this->redirect()->toRoute('index');
	}

	public function updatesessionajaxAction(){

		$property_id = $_POST['property_id'];
		$tab         = $_POST['tab'];
		$user_session = new Container('user');
		$user_session->tab         = $tab;
		$user_session->property_id = $property_id;

	}

	public function getsessionajaxAction(){

		$user_session = new Container('user');

		$JsonObj = new JsonModel(array(
	    							'email' 		=> $user_session->email,
            						'id'			=> $user_session->id,
									'last_active'   => $user_session->last_active,
									'fingerpring'   => $user_session->fingerprint,
									'isloggedin'    => $user_session->isloggedin,
				                    'tab'			=> $user_session->tab,
				  				    'property_id'	=> $user_session->property_id
        						));



        return $JsonObj;
	}

}








