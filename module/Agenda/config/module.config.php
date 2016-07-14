<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Agenda;

return array(
    'router' => array(
        'routes' => array(
            'agenda-home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Agenda\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'agenda-user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/agenda/[:controller[/:action]][/:id]',
                    'constraints' => array(
                        'id'=> '[0-9]+'
                    )
                ),
            ),
            'agenda-admin-interna' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/:action]][/:id]',
                    'constraints' => array(
                        'id'=> '[0-9]+'
                    )
                ),
            ),
            'agenda-admin' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/:action][/page/:page]]',
                    'defaults' => array(
                        'action' => 'index',
                        'page' => 1
                    ),
                ),
            ),
            'agenda-auth' => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/agenda/auth',
                    'defaults' => array(
                        'controller' => 'agenda/auth',
                        'action'     => 'index',
                    )
                )
            ),
            'agenda-logout' => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/agenda/auth/logout',
                    'defaults' => array(
                        'controller' => 'agenda/auth',
                        'action'     => 'logout',
                    )
                )
            )

        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
        'invokables' => array(
            'AgendaAdmin\Form\Contato' => 'AgendaAdmin\Form\Contato'
        )
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Agenda\Controller\Index' => 'Agenda\Controller\IndexController',
            'users' => 'Agenda\Controller\UsersController',
            'contatos' => 'AgendaAdmin\Controller\ContatosController',
            'agenda/auth' => 'Agenda\Controller\AuthController',
        ),
    ),
    'module_layouts' => array(
        'Agenda' => 'layout/layout',
        'AgendaAdmin' => 'layout/layout-admin'
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'agenda/index/index' => __DIR__ . '/../view/agenda/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
