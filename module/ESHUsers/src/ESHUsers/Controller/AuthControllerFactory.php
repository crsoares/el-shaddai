<?php

namespace ESHUsers\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthControllerFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$ctr = new AuthController();
		$ctr->setLoginForm(new \ESHUsers\Form\Login());

		$ctr->setAuthService($serviceLocator->getServiceLocator()->get('ESHUsers\Service\AuthService'));

		return $ctr;
	}
}