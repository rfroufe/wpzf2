<?php
return array(
    
	// The following section is new and should be added to your file
	'router' => array(
			'routes' => array(
					'projects' => array(
							'type'    => 'segment',
							'options' => array(
									'route'    => '/projects[/][:action][/:idproject]',
									'constraints' => array(
											'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'id'     => '[0-9]+',
									),
									'defaults' => array(
											'controller' => 'Projects\Controller\Index',
											'action'     => 'index',
									),
							),
					),
			),
	),
   
    'controllers' => array(
        'invokables' => array(
            'Projects\Controller\Index' => 'Projects\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
        	//'layout/layout'           => __DIR__ . '/../view/layout/backend.phtml',
            //'projects/index/index' => __DIR__ . '/../view/projects/index/index.phtml',            
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
