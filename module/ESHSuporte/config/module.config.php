<?php

namespace ESHSuporte;

return array(
	'router' => array(
		'routes' => array(
			'esh-suporte' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/home',
					'defaults' => array(
						'controller' => 'ESHSuporte\Controller\Index',
						'action' => 'index',
					)
				)
			),
			'esh-suporte-cadastro' => array(
				'type' => 'Literal',
				'options' => array(
					'route' => '/cadastro',
					'defaults' => array(
						//'__NAMESPACE__' => 'ESHSuporte\Controller',
						//'controller' => 'Clientes',
						'controller' => 'eshsuporte-controller-clientes',
						'action' => 'new',
					)
				)
			)
		)
	),
	/*
	 * Aqui um exemplo bem simples do Zend\Di. O Zend\Di e uma 
	 * ferramenta fantastica mais eu não uso muito porque ele 
	 * faz muita magica. Entao por motivos de clareza e pra que
	 * o codigo fique facil pra outros programadores as vezes
	 * prefiro não usar.....
	 */
	'di' => array(
		'allowed_controllers' => array(
			'eshsuporte-controller-clientes'
		),
		'definition' => array(
			'class' => array(
				'ESHSuporte\Controller\ClientesController' => array(
					'setEntityManager' => array(
						'required' => true,
					),
					'setFormClientes' => array(
						'required' => true,
					),
					'setClienteEntity' => array(
						'required' => true,
					)
				)
			)
		),
		'instance' => array(
			'alias' => array(
				'eshsuporte-controller-clientes' => 'ESHSuporte\Controller\ClientesController',
			)
		)
	),
	/*
	 * OBS: Estou registrando meus controllers no module.config.php mais isso tambem pode 
	 * ser feito tambem pelo Module.php
	 */
	'controllers' => array(
		'invokables' => array(
			'ESHSuporte\Controller\Index' => 'ESHSuporte\Controller\IndexController'
		),
		/*
		 * O codigo logo abaixo requer um pouco mais de digitação mais é 
		 * mais claro que o Zend\Di... Gosto de utiliza-lo para que o 
		 * codigo fique claro para outro programadores que nao estao acostumado 
		 * com Zend\Di.
		 * OBS: Este exemplo esta fazendo o mesmo que o Zend\Di logo acima...
		 */
		/*'factories' => array(
			'ESHSuporte\Controller\Clientes' => function($serviceLocator) {
				$crt = new \ESHSuporte\Controller\ClientesController();
				$crt->setEntityManager(
					$serviceLocator->getServiceLocator()->get('Doctrine\ORM\EntityManager')
				);
				$crt->setFormClientes(
					$serviceLocator->getServiceLocator()->get('ESHSuporte\Form\CadastroForm')
				);
				$crt->setClienteEntity(
					$serviceLocator->getServiceLocator()->get('ESHSuporte\Entity\Cliente')
				);
				return $crt;
			}
		)*/
	),
	/*
	 * OBS: Os serviços tambem poder ser registrados no Module.php
	 */
	'service_manager' => array(
		'invokables' => array(
			'ESHSuporte\Form\CadastroForm' => 'ESHSuporte\Form\CadastroForm',
			'ESHSuporte\Entity\Cliente' => 'ESHSuporte\Entity\Cliente', 
		)
	),
	/*
	 * OBS: Os views tambem poder ser registrados no Module.php
	 */
	'view_manager' => array(
		'template_path_stack' => array(
			'eshsuporte' => __DIR__ . '/../view',
		)
	),
	'doctrine' => array(
		'driver' => array(
			__NAMESPACE__ . '_driver' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
			),
			'orm_default' => array(
				'drivers' => array(
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
				)
			)
		)
	)
);