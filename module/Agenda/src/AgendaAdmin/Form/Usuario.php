<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 12:21
 */

namespace AgendaAdmin\Form;

use Zend\Form\Element\Hidden;
use Zend\Form\Element\Password;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class Usuario extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('usuario');

        $this->setAttribute('method','post');
        //$this->setInputFilter(new CategoriaFilter());

        $id = new Hidden('id');

        $this->add($id);

        $nome = new Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'id'     => 'nome',
                'class'  => 'form-control',
                'style'       => 'width:250px',
                'placeholder' => 'Entre com o nome'
            ));

        $this->add($nome);

        $email = new Text('email');
        $email->setLabel('Email')
            ->setAttributes(array(
                'id'     => 'email',
                'class'  => 'form-control',
                'style'       => 'width:250px',
                'placeholder' => 'Entre com o email'
            ));

        $this->add($email);

        $password = new Password('senha');
        $password->setLabel('Senha')
            ->setAttributes(array(
                'id'     => 'senha',
                'class'  => 'form-control',
                'style'       => 'width:250px',
                'placeholder' => 'Entre com a senha'
            ));

        $this->add($password);

        $submit = new Submit('submit');
        $submit->setAttributes(array(
            'value'  => 'SALVAR',
            'class' => 'btn-success'
        ));

        $this->add($submit);

    }

}