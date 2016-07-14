<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 23:31
 */

namespace Agenda\Service;

use Agenda\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;

class Contato extends AbstractService
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
        $this->entity = "Agenda\Entity\Contato";
    }

    public function insertContato(array $data,Usuario $usuario){

        $entity = new $this->entity($data);

            $usuario = $this->em->getReference('Agenda\Entity\Usuario',$usuario->getId());
            $entity->setUsuario($usuario);

            $this->em->persist($entity);
            $this->em->flush();


            return $entity;


    }

    public function updateContato(array $data,Usuario $usuario){

        $entity = $this->em->getReference($this->entity,$data['id']);

        $hydrator = new ClassMethods();
        $hydrator->hydrate($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;

    }


}