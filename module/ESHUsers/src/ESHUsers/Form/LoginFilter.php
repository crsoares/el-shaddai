<?php

namespace ESHUsers\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class LoginFilter extends InputFilter
{
	public function __construct()
	{
		$this->add(array(
			'name' => 'nome',
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'O campo nome é de preenchimento obrigatorio!'
						)
					)
				)
			),
			'filters' => array(
				array(
					'name' => 'StringTrim'
				)
			)
		));

		$this->add(array(
			'name' => 'email',
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Campo email é de preenchimento obrigatorio!'
 						)
					)
				),
				array(
					'name' => 'EmailAddress',
					'options' => array(
						'messages' => array(
							\Zend\Validator\EmailAddress::INVALID_FORMAT => 'Digite um email válido!'
						)
					)
				)
			)
		));

		$this->add(array(
			'name' => 'password',
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							\Zend\Validator\NotEmpty::IS_EMPTY => 'Digite uma senha!'
						)
					)
				)
			)
		));
	}
}