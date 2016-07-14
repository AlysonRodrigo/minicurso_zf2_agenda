<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 18/02/16
 * Time: 09:15
 */

namespace Agenda\Service;

use Zend\Hydrator\ClassMethods;

use Doctrine\ORM\EntityManager;


class Usuario extends AbstractService
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
        $this->entity = "Agenda\Entity\Usuario";
    }

    public function insert(array $data){

        $repo_usuario = $this->em->getRepository('Agenda\Entity\Usuario');

        $user_comparado = $repo_usuario->findOneBy(array('email' => $data['email']));

        if(!$user_comparado){
            parent::insert($data);
            return true;
        }else
            return false;

    }

    public function update(array $data){

        $entity = $this->em->getReference($this->entity,$data['id']);

        if(empty($data['senha']))
            unset($data['senha']);

        $hydrator = new ClassMethods();
        $hydrator->hydrate($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }


}