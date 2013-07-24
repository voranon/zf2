<?php
namespace Index;

use Zend\Db\Adapter\Adapter;

use Index\Model\ItemTable;
use Index\Model\Member;
use Index\Model\MemberTable;
use Index\Model\Property;
use Index\Model\PropertyTable;
use Index\Model\Propertybuyingcostitem;
use Index\Model\PropertybuyingcostitemTable;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;




Class module{
	public function getAutoloaderConfig(){
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
					__DIR__.'/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
					'namespaces' => array(
					__NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__,
					),
			),
		);
	}

	public function getConfig(){
		return include __DIR__.'/config/module.config.php';
	}


	public function getServiceConfig()
	{

		return array(
            'factories' => array(
            		// just in cass it's used in controller
            		'my_index_db_adapter' => function ($sm) {
						$config  = $sm->get('config');
						$adapter = new Adapter( $config['index_db_config'] );
						return $adapter;
            		},
            		'Index\Model\ItemTable'   =>  function($sm){
            			// get adapter
            			$config = $sm->get('config');
            			$adapter = new Adapter( $config['index_db_config'] );

            			$tableGateway = new TableGateway('items', $adapter, null);
            			$table = new ItemTable($tableGateway);
            			return $table;

            		},
            		'Index\Model\MemberTable' =>  function($sm) {
						// get adapter
            			$config = $sm->get('config');
            			$adapter = new Adapter( $config['index_db_config'] );

            			$resultSetPrototype = new ResultSet();
            			$resultSetPrototype->setArrayObjectPrototype(new Member());

            			$tableGateway = new TableGateway('members', $adapter, null, $resultSetPrototype);
            			$table = new MemberTable($tableGateway);
            			return $table;
            		},
            		'Index\Model\PropertyTable' =>  function($sm) {
            			// get adapter
            			$config = $sm->get('config');
            			$adapter = new Adapter( $config['index_db_config'] );

            			$PropertyresultSetPrototype 			= new ResultSet();
            			$PropertyresultSetPrototype->setArrayObjectPrototype(new Property());
            			$PropertytableGateway 					= new TableGateway('properties', $adapter, null, $PropertyresultSetPrototype);

            			$table = new PropertyTable($PropertytableGateway,$adapter);
            			return $table;
            		},
            		'Index\Model\Property_buyingcost_itemTable' =>  function($sm) {
            			// get adapter
            			$config = $sm->get('config');
            			$adapter = new Adapter( $config['index_db_config'] );

            			$resultSetPrototype = new ResultSet();
            			$resultSetPrototype->setArrayObjectPrototype(new Propertybuyingcostitem());

            			$tableGateway = new TableGateway('property_buyingcost_items', $adapter, null, $resultSetPrototype);
            			$table = new PropertybuyingcostitemTable($tableGateway);
            			return $table;
            		},

            )
        );
	}

}
