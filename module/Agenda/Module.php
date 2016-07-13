<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Agenda;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;

use Agenda\Service\Contato as ContatoServiceDoctrine;
use Agenda\Service\Usuario as UsuarioServiceDoctrine;

use Agenda\Auth\Adapter as AuthAdapter;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ . 'Admin' => __DIR__ . '/src/' . __NAMESPACE__ . "Admin",
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap($e) {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }, 98);
    }

    public function init(ModuleManager $moduleManager) {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach("AgendaAdmin", 'dispatch', function($e) {
            $auth = new AuthenticationService();

            $auth->setStorage(new SessionStorage("AgendaAdmin"));

            $controller = $e->getTarget();
            $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();

            if (!$auth->hasIdentity() and ($matchedRoute == "agenda-admin" or $matchedRoute == "agenda-admin-interna")) {
                return $controller->redirect()->toRoute('agenda-auth');
            }
        }, 99);
    }

    public function getServiceConfig(){

        return array(
            'factories' => array(

                'Agenda\Service\Contato' => function($sm){
                    return new ContatoServiceDoctrine($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Agenda\Service\Usuario' => function($sm){
                    return new UsuarioServiceDoctrine($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Agenda\Auth\Adapter' => function($sm){
                    return new AuthAdapter($sm->get('Doctrine\ORM\EntityManager'));
                },

            ),

        );

    }

    public function getViewHelperConfig() {
        return array(
            'invokables' => array(
                'UserIdentity' => 'Agenda\View\Helper\UserIdentity'
            )
        );
    }


}
