<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 18/02/16
 * Time: 09:15
 */

namespace Livraria\Service;

use Zend\Hydrator\ClassMethods;

use Doctrine\ORM\EntityManager;


class Usuario extends AbstractService
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
        $this->entity = "Livraria\Entity\Usuario";
    }

    public function update(array $data){

        $entity = $this->em->getReference($this->entity,$data['id']);

        if(empty($data['password']))
            unset($data['password']);

        $hydrator = new ClassMethods();
        $hydrator->hydrate($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }


}