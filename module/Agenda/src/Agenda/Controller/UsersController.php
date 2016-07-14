<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Agenda\Controller;

use AgendaAdmin\Controller\CrudController;
use Zend\View\Model\ViewModel;

class UsersController extends CrudController
{

    public function __construct() {
        $this->entity = "Agenda\Entity\Usuario";
        $this->form = "AgendaAdmin\Form\Usuario";
        $this->service = "Agenda\Service\Usuario";
        $this->controller = "users";
        $this->route = "agenda-auth";
        $this->message = false;
    }

    public function newAction(){

        $form = new $this->form();
        $request = $this->getRequest();

        if($request->isPost()){

            $data = $request->getPost();
            $form->setData($data);

            if($form->isValid()){
                // Rotina de Insercao

                $service = $this->getServiceLocator()->get($this->service);

                if($valor = $service->insert($request->getPost()->toArray())) {
                    $this->message = false;
                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
                }else{
                    $this->message = true;
                }

            }

        }

        return new ViewModel(array(
            'form' => $form,
            'message' => $this->message
        ));
    }

    public function editAction() {
        $form = new $this->form();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0)) {
            $array = $entity->toArray();
            unset($array['password']);
            $form->setData($array);
        }
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $res = $service->update($request->getPost()->toArray());
                return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
            }
        }
        return new ViewModel(array('form' => $form));
    }
}
