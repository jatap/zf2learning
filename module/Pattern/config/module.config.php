<?php

namespace Pattern;

return array(
    'controllers' => array(
        'invokables' => array(
            'Pattern\Controller\Pattern' => 'Pattern\Controller\PatternController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'pattern' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pattern[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Pattern\Controller\Pattern',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'pattern' => __DIR__ . '/../view',
        ),
    ),

     // Doctrine config - just configured for namespace album !!
     // Source: https://github.com/doctrine/DoctrineORMModule/
    'doctrine' => array(
        'driver' => array(
            'my_annotation_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Pattern/Entity')
            ),
            'Pattern' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Pattern/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Pattern' => 'my_annotation_driver'
                )
            )
        )
    ),
);