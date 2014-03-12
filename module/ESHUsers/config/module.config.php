<?php

namespace ESHUsers;

return array(
	'router' => array(
		'routes' => array(
			'eshusers-login' => array(
				'type' => 'Literal',
				'options' => array(
					'route' => '/login',
					'defaults' => array(
						'controller' => 'ESHUsers\Controller\Auth',
						'action' => 'login'
					)
				)
			),
			'eshusers-logout' => array(
				'type' => 'Literal',
				'options' => array(
					'route' => '/logout',
					'defaults' => array(
						'__NAMESPACE__' => 'ESHUsers\Controller',
						'controller' => 'Auth',
						'action' => 'logout',
					)
				)
			)
		)
	),
	'controllers' => array(
		'factories' => array(
			'ESHUsers\Controller\Auth' => 'ESHUsers\Controller\AuthControllerFactory',
		)
	),
	'service_manager' => array(
		'factories' => array(
			'Zend\Db\Adapter\Adapter' => function($sm) {
				$config = $sm->get('Config');
				$dbParams = $config['dbParams'];
				return new \Zend\Db\Adapter\Adapter(array(
					'driver' => 'pdo',
					'dsn' => 'mysql:dbname=' . $dbParams['database'] . ';host=' . $dbParams['hostname'], 
					'database' => $dbParams['database'],
					'username' => $dbParams['username'],
					'password' => $dbParams['password'],
					'hostname' => $dbParams['hostname']
				));
			},
			'ESHUsers\Service\AuthService' => 'ESHUsers\Service\AuthServiceFactory'
		)
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'eshusers' => __DIR__ . '/../view'
		)
	)
);