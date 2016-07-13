<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace AgendaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UsersController extends CrudController
{
    public function __construct() {
        $this->entity = "Agenda\Entity\Usuario";
        $this->form = "AgendaAdmin\Form\Usuario";
        $this->service = "Agenda\Service\Usuario";
        $this->controller = "users";
        $this->route = "agenda-admin";
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
