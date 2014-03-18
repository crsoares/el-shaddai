<?php

namespace ESHUsers\Form;

use Zend\Form\Form;

use ESHUsers\Form\LoginFilter;

class Login extends Form
{
	public function __construct()
	{
		parent::__construct('login');
		$this->setAttribute('action', '/login');
		$this->setAttribute('method', 'post');
		$this->setInputFilter(new LoginFilter());

		$this->add(array(
			'name' => 'nome',
			'attibutes' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'Login:'
			)
		));

		$this->add(array(
			'name' => 'email',
			'attributes' => array(
				'type' => 'password',
			),
			'options' => array(
				'label' => 'Senha'
			)
		));

		$this->add(array(
			'name' => 'password',
			'attributes' => array(
				'type' => 'password',
			),
			'options' => array(
				'label' => 'Senha'
			)
		));

		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
				'value' => 'Entrar'
			)
		));
	}
}