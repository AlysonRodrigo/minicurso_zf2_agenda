<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 12:28
 */

namespace AgendaAdmin\Filter;


use Zend\InputFilter\InputFilter;

class UsuarioFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(array(
            'name'     => 'nome',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array('isEmpty' => 'Nome nao pode está em branco')
                    )
                )
            )
        ));

        $this->add(array(
            'name'     => 'email',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array('isEmpty' => 'Email nao pode está em branco')
                    )
                )
            )
        ));

        $this->add(array(
            'name'     => 'senha',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array('isEmpty' => 'Senha nao pode está em branco')
                    )
                )
            )
        ));
    }

}