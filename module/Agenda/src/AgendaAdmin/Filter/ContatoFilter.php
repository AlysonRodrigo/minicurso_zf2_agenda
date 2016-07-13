<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 12:28
 */

namespace AgendaAdmin\Filter;


use Zend\InputFilter\InputFilter;

class ContatoFilter extends InputFilter
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
    }

}