<?php

namespace ESHSuporte\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

use ESHSuporte\Entity\Cliente;

class ClienteFieldset extends Fieldset implements InputFilterProviderInterface
{
	public function __construct()
	{
		parent::__construct('cliente');
		$this->setHydrator(new ClassMethodsHydrator(false))
			 ->setObject(new Cliente());

		$this->add(array(
			'name' => 'razaoSocial',
			'attributes' => array(
				'class' => 'input-sm form-control',
			),
			'options' => array(
				'label' => 'Razao Social',
			),
		));

		$this->add(array(
			'name' => 'nomeFantasia',
			'attributes' => array(
				'class' => 'input-sm form-control',
			),
			'options' => array(
				'label' => 'Nome Fantasia'
			)
		));

		$this->add(array(
			'name' => 'nomeRepresentante',
			'attributes' => array(
				'class' => 'input-sm form-control',
			),
			'options' => array(
				'label' => 'Nome Representante'
			)
		));
	}

	public function getInputFilterSpecification()
	{
		return array(
			'razaoSocial' => array(
				'filters' => array(
					array(
						'name' => 'StringTrim'
					)
				),
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'break_chain_on_failure' => true,
						'options' => array(
							'messages' => array(
								\Zend\Validator\NotEmpty::IS_EMPTY => 'Por favor coloque suas informações.'
							)
						)
					)
				)
			),
			'nomeFantasia' => array(
				'filters' => array(
					array(
						'name' => 'StringTrim'
					)
				),
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'break_chain_on_failure' => true,
						'options' => array(
							'messages' => array(
								\Zend\Validator\NotEmpty::IS_EMPTY => 'Por favor coloque suas informacaoes.'
							)
						)
					)
				)
			)
		);
	}
}