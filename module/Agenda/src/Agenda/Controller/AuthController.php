<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 17/02/16
 * Time: 10:50
 */

namespace Agenda\Controller;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use AgendaAdmin\Form\Login as LoginForm;


class AuthController extends AbstractActionController
{


    public function indexAction()
    {
        global $error;

        $form = new LoginForm();
        $error = false;

        $request = $this->getRequest();

        if($request->isPost()){

            $form->setData($request->getPost());

            if($form->isValid()){
                $data = $request->getPost()->toArray();

                $auth = new AuthenticationService();

                $sessionStorage = new SessionStorage('AgendaAdmin');
                $auth->setStorage($sessionStorage);

                $authAdapter = $this->getServiceLocator()->get('Agenda\Auth\Adapter');
                $authAdapter->setUsername($data['email']);
                $authAdapter->setPassword($data['senha']);

                $result = $auth->authenticate($authAdapter);

                if($result->isValid()){
                    $sessionStorage->write($auth->getIdentity()['user'],null);
                    return $this->redirect()->toRoute('agenda-admin',array('controller' => 'contatos'));
                }else
                    $error = true;

            }
        }

        return new ViewModel(array(
            'form' => $form,
            'error' => $error
        ));
    }

    public function logoutAction(){

        $auth = new AuthenticationService();
        $auth->setStorage(new SessionStorage('AgendaAdmin'));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('agenda-auth');

    }

}