<?php

namespace ESHUsers\Controller;

use Doctrine\ORM\Mapping as ORM;

use Zend\Stdlib\Hydrator\ClassMethods;

/*
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
{
	/*
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/*
	 * @ORM\Column(type="string")
	 */
	protected $nome;

	/*
	 * @ORM\Column(type="string")
	 */
	protected $email;

	/*
	 * @ORM\Column(type="string")
	 */
	protected $password;

	/*
	 * @ORM\Column(type="string")
	 */
	protected $salt;

	/*
	 * @ORM\Column(type="boolean", nullable=true)
	 */
	protected $active;

	/*
	 * @ORM\Column(type="string", name="activation_key")
	 */
	protected $activationKey;

	/*
	 * @ORM\Column(type="string")
	 */
	protected $token;

	/*
	 * @ORM\Column(type="datetime")
	 */
	protected $created;

	/*
	 * @ORM\Column(type="datetime")	
	 */
	protected $updated;

	public function __construct()
	{
		$this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
		$this->created = new \Datetime('now');
		$this->activationKey = sha1($this->email.$this->salt);
		$this->token = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
	}

	public function encryptPassword($password)
	{
		return base64_encode(
			Pbkdf2::clalc('sha256', $password, $this->salt, 10000, strlen($password)*2);
		);
	}
	
	public function getId()
	{
		return $this->id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public fnction setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setPassword($password)
	{
		$this->password = $this->encryptPassword($password);
		return $this;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setSalt($salt)
	{
		$this->salt = $salt;
		return $this;
	}

	public function getSalt()
	{
		return $this->sal;
	}

	public function setActive($active)
	{
		$this->active = $active;
		return $this;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function setActivationKey($activationKey)
	{
		$this->activationKey = $activationKey;
		return $this;
	}

	public function getActivationKey()
	{
		return $this->activationKey;
	}

	public function setToken($token)
	{
		$this->token = $token;
		return $this;
	}

	public function getToken()
	{
		return $this->token;
	}

	public function setCreated($created)
	{
		$this->created = $created;
		return $this;
	}

	public function getCreated()
	{
		return $this->created;
	}

	public function setUpdated($updated)
	{
		$this->updated = $updated;
		return $this;
	}

	public function getUpdated()
	{
		return $this->updated;
	}

    public function toArray()
    {
    	return (new ClassMethods)->extract($this);
    }

}