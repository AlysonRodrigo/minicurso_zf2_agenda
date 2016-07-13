<?php

namespace Agenda\Auth;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

use Doctrine\ORM\EntityManager;

class Adapter implements AdapterInterface
{

    protected $em;
    protected $username;
    protected $password;


    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        $repository = $this->em->getRepository('Agenda\Entity\Usuario');
        $user = $repository->findByEmailAndPassword($this->getUsername(),$this->getPassword());

        if($user){
            return new Result(Result::SUCCESS, array('user'=>$user),array('OK'));
        }else
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Adapter
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return Adapter
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }


}