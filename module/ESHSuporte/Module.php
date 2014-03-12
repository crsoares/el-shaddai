<?php

namespace ESHSuporte;

class Module
{
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				)
			)
		);
		/*
		 * A linha comentada logo abaixo faz o carregamento de classes
		 * utilizando o autoload_classmap.php, autoload_function.php e
		 * autoload_register.php (Para ver um exemplo de como isso é feito
		 * abra os arquivos citados). Carregar as classes dessa forma ganhamos
		 * em desempenho porem quando criamos uma nova classe temos que 
		 * adiciona-la ao array em autoload_classmap.php	
		 */
		//require "autoload_register.php";
	}

	/*public function getServiceConfig()
	{
		return array(
			'invokables' => array(
				'greetingService' => 'ESHSuporte\Service\GreetingService'
			)
		);
	}*/
}