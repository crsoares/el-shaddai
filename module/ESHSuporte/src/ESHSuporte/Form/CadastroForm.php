<?php

namespace ESHSuporte\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class CadastroForm extends Form
{
	public function __construct()
	{
		parent::__construct('formCadastro');
		$this->setAttribute('method', 'post')
			 ->setHydrator(new ClassMethodsHydrator(false))
			 ->setInputFilter(new InputFilter());

		$this->add(array(
			'type' => 'ESHSuporte\Form\ClienteFieldset',
			'options' => array(
				'use_as_base_fieldset' => true,
			)
		));

		$this->add(array(
			'type' => 'Zend\Form\Element\Csrf',
			'name' => 'csrf'
		));

		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
				'value' => 'Cadastrar',
				'class' => 'btn btn-default'
			)
		));

		$this->setValidationGroup(array(
			'csrf',
			'cliente' => array(
				'razaoSocial',
				'nomeFantasia',
				'nomeRepresentante'
			)
		));

	}
}