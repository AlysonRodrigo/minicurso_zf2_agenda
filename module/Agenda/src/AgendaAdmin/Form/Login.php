<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 12:21
 */

namespace AgendaAdmin\Form;


use LivrariaAdmin\Filter\CategoriaFilter;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Password;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class Login extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('usuario');

        $this->setAttribute('method','post');
        //$this->setInputFilter(new CategoriaFilter());

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
            'value'  => 'Entrar',
            'class' => 'btn-success'
        ));

        $this->add($submit);

    }

}