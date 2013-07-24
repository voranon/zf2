<?php

namespace Index\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use Index\Model\Propertybuyingcostitem;

class PropertybuyingcostController extends AbstractActionController
{
	/**
	 * The default action - show the home page
	 */

	public function indexajaxAction() {

		$user_session = new Container('user');

		$sm = $this->getServiceLocator();
		$this->itemTable = $sm->get('Index\Model\ItemTable');

		$this->PropertyTable = $sm->get('Index\Model\PropertyTable');
		$property = $this->PropertyTable->getProperty( $user_session->property_id );
		$property_buyingcost_items = $property->get_buyingcost_items();


		$buyingcost_items 		= $this->itemTable->get_Items('buying_cost_item');

		$view = new ViewModel(array(
								'buyingcost_items' 			=> $buyingcost_items,
								'property_buyingcost_items' => $property_buyingcost_items
							));
		$view->setTerminal(true);
		return $view;

	}

	public function addbuyingcostitemajaxAction(){
		$user_session = new Container('user');

		$buyingcost_item_amount = $_POST['buyingcost_item_amount'];
		$buyingcost_item_id     = $_POST['buyingcost_item_id'];

		$sm = $this->getServiceLocator();
		$this->Property_buyingcost_itemTable = $sm->get('Index\Model\Property_buyingcost_itemTable');

		$property_buyingcost_item = new Propertybuyingcostitem();

		$property_buyingcost_item->set_property_id($user_session->property_id);
		$property_buyingcost_item->set_buyingcost_item_id($buyingcost_item_id);
		$property_buyingcost_item->set_property_buyingcost_item_amount($buyingcost_item_amount);

		$property_buyingcost_item_id = $this->Property_buyingcost_itemTable->saveProperty_buyingcost_item($property_buyingcost_item);

		$this->PropertyTable = $sm->get('Index\Model\PropertyTable');
		$property = $this->PropertyTable->getProperty( $user_session->property_id );
		$property_buyingcost_items = $property->get_buyingcost_items();

		$view = new ViewModel(array(
				'property_buyingcost_items' => $property_buyingcost_items
		));
		$view->setTerminal(true);

		return $view;
	}

	public function deletebuyingcostitemajaxAction(){

		$user_session 			= new Container('user');
		$property_buyingcost_item_id     = $_POST['property_buyingcost_item_id'];

		$sm = $this->getServiceLocator();
		$this->Property_buyingcost_itemTable = $sm->get('Index\Model\Property_buyingcost_itemTable');

		$this->Property_buyingcost_itemTable->deleteProperty_buyingcost_item($property_buyingcost_item_id);

		$this->PropertyTable = $sm->get('Index\Model\PropertyTable');
		$property = $this->PropertyTable->getProperty( $user_session->property_id );
		$property_buyingcost_items = $property->get_buyingcost_items();

		$view = new ViewModel(array(
				'property_buyingcost_items' => $property_buyingcost_items
		));
		$view->setTerminal(true);

		return $view;


	}


}
