<?php

namespace ESHSuporte\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */
class Cliente
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/**
     * @ORM\Column(type="string")
	 */
	protected $razaoSocial;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $nomeFantasia;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $nomeRepresentante;

	public function getId()
	{
		return $this->id;
	}

	public function setRazaoSocial($razaoSocial)
	{
		$this->razaoSocial = $razaoSocial;
		return $this;
	}

	public function getRazaoSocial()
	{
		return $this->razaoSocial;
	}

	public function setNomeFantasia($nomeFantasia)
	{
		$this->nomeFantasia = $nomeFantasia;
		return $this;
	}

	public function getNomeFantasia()
	{
		return $this->nomeFantasia;
	}

	public function setNomeRepresentante($nomeRepresentante)
	{
		$this->nomeRepresentante = $nomeRepresentante;
		return $this;
	}

	public function getNomeRepresentante()
	{
		return $this->nomeRepresentante;
	}
}