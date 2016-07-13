<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 16/02/16
 * Time: 22:14
 */

namespace Agenda\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{


    public function indexAction()
    {
        // Zend DB
        // $categoriaService = $this->getServiceLocator()->get('Livraria\Model\CategoriaService');
        // $categorias = $categoriaService->fetchAll();

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $repo = $em->getRepository('Agenda\Entity\Contato');

        $contatos = $repo->findAll();

        return new ViewModel(array('contatos' => $contatos));
    }

}