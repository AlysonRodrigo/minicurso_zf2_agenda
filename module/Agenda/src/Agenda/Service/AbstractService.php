<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 13:11
 */

namespace Agenda\Service;

use Doctrine\ORM\EntityManager;

use Zend\Hydrator\ClassMethods;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;


class AbstractService
{
    /*
     * @var EntityManager
     */
    protected $em;
    protected $entity;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function insert(array $data){

        $entityData = new $this->entity($data);

        $this->em->persist($entityData);
        $this->em->flush();
        return $entityData;
    }

    public function update(array $data){

        $entity = $this->em->getReference($this->entity,$data['id']);

        $hydrator = new ClassMethods();
        $hydrator->hydrate($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;


    }

    public function delete($id){

        $entityData = $this->em->getReference($this->entity,$id);

        if($entityData){
            $this->em->remove($entityData);
            $this->em->flush();
            return $id;

        }
    }

    public function getUserIdentity($namespace = null){

        $sessionStorage = new SessionStorage($namespace);
        $this->authService = new AuthenticationService;
        $this->authService->setStorage($sessionStorage);

        if ($this->authService->hasIdentity()) {
            return $this->authService->getIdentity();
        }else
            return null;
    }


}