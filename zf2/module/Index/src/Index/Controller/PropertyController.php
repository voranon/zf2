<?php
namespace Index\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Index\Model\Property;



class PropertyController extends AbstractActionController
{

	private $properties;

	public function __construct(){


	}

	public function onDispatch( \Zend\Mvc\MvcEvent $e )
	{


			return parent::onDispatch( $e );
	}

	public function testAction(){

		$sm = $this->getServiceLocator();
		$propertyTable = $sm->get('Index\Model\PropertyTable');
		$property = $propertyTable->getProperty(3); // china town

		echo $property->get_property_name();
		$d = $property->get_buyingcost_items();

		foreach( $d as $a){

			//echo $a->created_date;
			//echo $a->get_created_date();
			echo $a['property_buyingcost_item_amount'];
		}

	}

	public function getpropertytabajaxAction(){

		$user_session = new Container('user');
		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);



		$JsonObj = new JsonModel(array(
				'address' 		=> array(
										'street'	 =>	$property->get_property_street(),
										'city'		 =>  $property->get_property_city(),
										'state'		 =>  $property->get_property_state(),
										'zip'		 =>  $property->get_property_zip(),
										'country'	 =>  $property->get_property_country(),

										'mls'		 =>  $property->get_property_mls(),
										'style'		 =>  $property->get_property_style(),
										'squarefeet' =>  $property->get_property_squarefeet(),
										'lotsize'	 =>  $property->get_property_lotsize(),
										'yearbuilt'	 =>  $property->get_property_yearbuilt(),
										'lastremodel'=>  $property->get_property_lastremodel(),
										'parking'	 =>  $property->get_property_parking(),
								        'hoa'	     =>  $property->get_property_hoa()
										),

		));



		return $JsonObj;
	}

	public function updatestreetajaxAction(){

		    $street = $_POST['street'];
			$user_session = new Container('user');

			$sm = $this->getServiceLocator();
			$this->propertyTable = $sm->get('Index\Model\PropertyTable');

            $property = $this->propertyTable->getProperty($user_session->property_id);
			$property = new Property( $property);
			$property->set_property_street($street);

			$this->propertyTable->saveProperty($property);
			return $this->response;
	}

	public function updatecityajaxAction(){

			$city = $_POST['city'];
			$user_session = new Container('user');

			$sm = $this->getServiceLocator();
			$this->propertyTable = $sm->get('Index\Model\PropertyTable');

			$property = $this->propertyTable->getProperty($user_session->property_id);
			$property = new Property( $property);
			$property->set_property_city($city);

			$this->propertyTable->saveProperty($property);
			return $this->response;
	}

	public function updatestateajaxAction(){

			$state = $_POST['state'];
			$user_session = new Container('user');

			$sm = $this->getServiceLocator();
			$this->propertyTable = $sm->get('Index\Model\PropertyTable');

			$property = $this->propertyTable->getProperty($user_session->property_id);
			$property = new Property( $property);
			$property->set_property_state($state);

			$this->propertyTable->saveProperty($property);
			return $this->response;
	}

	public function updatezipajaxAction(){

		$zip = $_POST['zip'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_zip($zip);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatecountryajaxAction(){

		$country = $_POST['country'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_country($country);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatemlsajaxAction(){

		$mls = $_POST['mls'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_mls($mls);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatestyleajaxAction(){

		$style = $_POST['style'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_style($style);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatesquarefeetajaxAction(){

		$squarefeet = $_POST['squarefeet'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_squarefeet($squarefeet);

		$this->propertyTable->saveProperty($property);
		return $this->response;

	}

	public function updatelotsizeajaxAction(){

		$lotsize = $_POST['lotsize'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_lotsize($lotsize);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updateyearbuiltajaxAction(){

		$yearbuilt = $_POST['yearbuilt'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_yearbuilt($yearbuilt);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatelastremodelajaxAction(){

		$lastremodel = $_POST['lastremodel'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_lastremodel($lastremodel);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updateparkingajaxAction(){

		$parking = $_POST['parking'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_parking($parking);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatehoaajaxAction(){

		$hoa = $_POST['hoa'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_hoa($hoa);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatelistingpriceajaxAction(){

		$listingprice = $_POST['listingprice'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_listingprice($listingprice);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updateinitimproveajaxAction(){

		$initimprove = $_POST['initimprove'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_initimprove($initimprove);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}

	public function updatepurchasepriceajaxAction(){

		$purchaseprice = $_POST['purchaseprice'];
		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$property = $this->propertyTable->getProperty($user_session->property_id);
		$property = new Property( $property);
		$property->set_property_purchaseprice($purchaseprice);

		$this->propertyTable->saveProperty($property);
		return $this->response;
	}


	public function addingpropertyajaxAction(){


		$property_name = $_POST['property_name'];
		$user_session = new Container('user');

		$property = new Property();

		$property->set_property_name($property_name);

		$property->set_member_id($user_session->id);


		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');


		$property_id = $this->propertyTable->saveProperty($property);




		if( $property_id != 0){  // new property for a member

			$view = new ViewModel(array(
					'property_name' => $property_name,
					'property_id'   => $property_id
			)
			);

			// Disable layouts; `MvcEvent` will use this View Model instead
			$view->setTerminal(true);
			return $view;

		}else{   // dupllicate name

			echo 0;
			return $this->response;

		}




	}

	public function delettingpropertyajaxAction(){


		$property_id = $_POST['property_id'];


		$sm = $this->getServiceLocator();
		$this->propertyTable = $sm->get('Index\Model\PropertyTable');

		$this->propertyTable->deleteProperty($property_id);


		return $this->response;

	}


}
