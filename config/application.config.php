<?php
/**
 * Configuration file generated by ZFTool
 * The previous configuration file is stored in application.config.old
 *
 * @see https://github.com/zendframework/ZFTool
 */
($env = getenv('APPLICATION_ENV')) ?:($env= 'production');

$modpro = array(
		// General
		'Application',
		'Project',
);
if ($env == 'development')
{
	// Modules Debug
	$moddev =array(
			'ZendDeveloperTools',
			'Album',
			'Simplemodule',
			'Checklist',
			'Cheetara',
	);
}
else
	$moddev=array();
$modules=array_merge($modpro,$moddev);


return array(
    'modules' => $modules,
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php'
        )
    )
);
