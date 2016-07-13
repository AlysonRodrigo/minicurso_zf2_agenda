<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 23:07
 */

namespace Agenda\Repository;


class ContatoRepository extends AbstractRepository
{

    public function findContatoByUser($usuario){
        return $this->findBy(array('usuario' => $usuario->getId()));
    }
}