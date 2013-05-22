<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Voyage\Controller\Voyage' => 'Voyage\Controller\VoyageController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'voyage' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/voyage[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Voyage\Controller\Voyage',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'voyage' => __DIR__ . '/../view',
        ),
    ),
);