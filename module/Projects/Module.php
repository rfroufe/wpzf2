<?php
namespace Projects;

use Projects\Model\Projects;
use Projects\Model\ProjectsTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

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
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Projects\Model\ProjectsTable' =>  function($sm) {
    						$tableGateway = $sm->get('ProjectsTableGateway');
    						$table = new ProjectsTable($tableGateway);
    						return $table;
    					},
    					'ProjectsTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Projects());
    						return new TableGateway('projects', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }
}
