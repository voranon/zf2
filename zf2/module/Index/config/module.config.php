<?php
return array(
	'controllers' => array(
			'invokables' => array(
					'Index\Controller\Index'    			=> 'Index\Controller\IndexController',
					'Index\Controller\Member'   			=> 'Index\Controller\MemberController',
					'Index\Controller\Property' 			=> 'Index\Controller\PropertyController',
					'Index\Controller\Propertybuyingcost' 	=> 'Index\Controller\PropertybuyingcostController',
			),
	),





	// The following section is new and should be added to your file
		'router' => array(
				'routes' => array(
						// index route
						'index' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/index[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Index\Controller\Index',
												'action'     => 'index',
										),
								),
						),
						// member route
						'member' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/member[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Index\Controller\Member',
												'action'     => 'property',
										),
								),
						),
						// property route
						'property' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/property[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Index\Controller\property',
												'action'     => 'index',
										),
								),
						),
						'propertybuyingcost' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/propertybuyingcost[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Index\Controller\propertybuyingcost',
												'action'     => 'index',
										),
								),
						),
				),
		),

	 'view_manager' => array(
	 	'template_map' => array(
	 		'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
	 		'error/404'               => __DIR__ . '/../view/error/404.phtml',
	 		'error/index'             => __DIR__ . '/../view/error/index.phtml',
	 	),
        'template_path_stack' => array(
            'index' => __DIR__ . '/../view',
        ),
	 	'strategies' => array(
	 		'ViewJsonStrategy',
	 	),
    ),

		'index_db_config'=> array(
				'driver'         => 'Pdo',
				'dsn'            => 'mysql:dbname=zf2;host=localhost',
				'username' 		 => 'zf2_test',
				'password'	     => 'Non@7924',

		)

	/* for amazon
		'index_db_config'=> array(
				'driver'         => 'Pdo',
				'dsn'            => 'mysql:dbname=zf2;host=test.ceaduklyw9ff.us-west-2.rds.amazonaws.com',
				'username' 		 => 'zf2_test',
				'password'	     => '6630Sunset!!!',

		)
	*/
	/* for rackspace
	'index_db_config'=> array(
            					'driver'         => 'Pdo',
            					'dsn'            => 'mysql:dbname=zf2;host=localhost',
            					'username' 		 => 'zf1',
            					'password'	     => '6630Sunset!!!',

            			)
	*/


);