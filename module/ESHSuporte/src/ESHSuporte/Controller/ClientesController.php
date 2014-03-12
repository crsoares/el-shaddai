<?php

/*
 * Esse é um controller com todas as dependencias injetadas
 * pelo zf2. Isso ajuda muito com teste com PHPUnit
 */

namespace ESHSuporte\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ClientesController extends AbstractActionController
{
	private $entityManager;
	private $formClientes;
	private $clienteEntity;

	public function newAction()
	{
		$this->formClientes->bind($this->clienteEntity);
		if($this->request->isPost()) {
			$this->formClientes->setData($this->request->getPost());
			if($this->formClientes->isValid()) {
				$this->entityManager->persist($this->clienteEntity);
				$this->entityManager->flush();
			}
		}
		return new ViewModel(array('form' => $this->formClientes));
	}

	public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	public function setFormClientes(\ESHSuporte\Form\CadastroForm $formClientes)
	{
		$this->formClientes = $formClientes;
	}

	public function setClienteEntity(\ESHSuporte\Entity\Cliente $clienteEntity) 
	{
		$this->clienteEntity = $clienteEntity;
	}

}