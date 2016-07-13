<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 23:08
 */

namespace Agenda\Repository;


class UsersRepository extends AbstractRepository
{

    public function findByEmailAndPassword($email,$password){

        $user = $this->findOneByEmail($email);
        if($user){
            //$hashSenha = $user->encryptPassword($password);

            if($password == $user->getSenha()){
                return $user;
            }
            else
                return false;
        }else
            return false;
    }
}