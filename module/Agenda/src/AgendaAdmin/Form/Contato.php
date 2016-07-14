<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 23:43
 */

namespace AgendaAdmin\Form;


use AgendaAdmin\Filter\ContatoFilter;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class Contato extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('contato-form');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new ContatoFilter());

        $id = new Hidden('id');
        $this->add($id);

        $nome = new Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'id' => 'nome',
                'class' => 'form-control',
                'style' => 'width:250px',
                'placeholder' => 'Entre com o nome'
            ));
        $this->add($nome);

        $email = new Text('email');
        $email->setLabel('Email')
            ->setAttributes(array(
                'id' => 'email',
                'class' => 'form-control',
                'style' => 'width:250px',
                'placeholder' => 'Entre com o email'
            ));
        $this->add($email);

        $telefone = new Text('telefone');
        $telefone->setLabel('Telefone')
            ->setAttributes(array(
                'id' => 'telefone',
                'class' => 'form-control',
                'style' => 'width:250px',
                'placeholder' => 'Entre com o telefone'
            ));
        $this->add($telefone);

        $celular = new Text('celular');
        $celular->setLabel('Celular')
            ->setAttributes(array(
                'id' => 'celular',
                'class' => 'form-control',
                'style' => 'width:250px',
                'placeholder' => 'Entre com o celular'
            ));
        $this->add($celular);

        $submit = new Submit('submit');
        $submit->setAttributes(array(
            'value' => 'SALVAR',
            'class' => 'btn btn-success'
        ));

        $this->add($submit);

    }

}