<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 10:50
 */

namespace AgendaAdmin\Controller;

use AgendaAdmin\Controller\CrudController;
use DoctrineORMModule\Proxy\__CG__\Agenda\Entity\Usuario;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;


class ContatosController extends CrudController
{

    public function __construct()
    {
        $this->entity     = "Agenda\Entity\Contato";
        $this->form       = "AgendaAdmin\Form\Contato";
        $this->service    = "Agenda\Service\Contato";
        $this->controller = "contatos";
        $this->route      = "agenda-admin";
    }

    public function indexAction()
    {



        $page = $this->params()->fromRoute('page');

        $service = $this->getServiceLocator()->get($this->service);
        $userAutenticado = $service->getUserIdentity('AgendaAdmin');

        $list = $this->getEm()
            ->getRepository($this->entity)
            ->findContatoByUser($userAutenticado);

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(10);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    public function newAction(){

        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        if($request->isPost()){

            $data = $request->getPost();
            $form->setData($data);

            if($form->isValid()){
                // Rotina de Insercao

                $service = $this->getServiceLocator()->get($this->service);

                $userAutenticado = $service->getUserIdentity('AgendaAdmin');

                $service->insertContato($request->getPost()->toArray(),$userAutenticado);

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }

        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function editAction(){

        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id',0));


        if($this->params()->fromRoute('id',0))
            $form->setData($entity->toArray());

        if($request->isPost()){
            $form->setData($request->getPost());
            if($form->isValid()){

                $service = $this->getServiceLocator()->get($this->service);

                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

}