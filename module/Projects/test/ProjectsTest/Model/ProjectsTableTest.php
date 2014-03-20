<?php
namespace ProjectsTest\Model;

use Projects\Model\ProjectsTable;
use Projects\Model\Projects;
use Zend\Db\ResultSet\ResultSet;
use PHPUnit_Framework_TestCase;

class ProjectsTableTest extends PHPUnit_Framework_TestCase
{
    public function testFetchAllReturnsAllProjectss()
    {
        $resultSet        = new ResultSet();
        $mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway',
                                           array('select'), array(), '', false);
        $mockTableGateway->expects($this->once())
                         ->method('select')
                         ->with()
                         ->will($this->returnValue($resultSet));

        $projectsTable = new ProjectsTable($mockTableGateway);

        $this->assertSame($resultSet, $projectsTable->fetchAll());
    }
    
    public function testCanRetrieveAnProjectsByItsId()
    {
    	$projects = new Projects();
    	$projects->exchangeArray(array('idproject'     => 123,
    			'name' => 'The Military Wives',
    			'description'  => 'In My Dreams'));
    
    	$resultSet = new ResultSet();
    	$resultSet->setArrayObjectPrototype(new Projects());
    	$resultSet->initialize(array($projects));
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('select'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('select')
    	->with(array('idproject' => 123))
    	->will($this->returnValue($resultSet));
    
    	$projectsTable = new ProjectsTable($mockTableGateway);
    
    	$this->assertSame($projects, $projectsTable->getProjects(123));
    }
    
    public function testCanDeleteAnProjectsByItsId()
    {
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('delete'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('delete')
    	->with(array('idproject' => 123));
    
    	$projectsTable = new ProjectsTable($mockTableGateway);
    	$projectsTable->deleteProjects(123);
    }
    
    public function testSaveProjectsWillInsertNewProjectssIfTheyDontAlreadyHaveAnId()
    {
    	$projectsData = array('name' => 'The Military Wives', 'description' => 'In My Dreams');
    	$projects     = new Projects();
    	$projects->exchangeArray($projectsData);
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('insert'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('insert')
    	->with($projectsData);
    
    	$projectsTable = new ProjectsTable($mockTableGateway);
    	$projectsTable->saveProjects($projects);
    }
    
    public function testSaveProjectsWillUpdateExistingProjectssIfTheyAlreadyHaveAnId()
    {
    	$projectsData = array('idproject' => 123, 'name' => 'The Military Wives', 'description' => 'In My Dreams','budget'=> '100');
    	$projects     = new Projects();
    	$projects->exchangeArray($projectsData);
    
    	$resultSet = new ResultSet();
    	$resultSet->setArrayObjectPrototype(new Projects());
    	$resultSet->initialize(array($projects));
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway',
    			array('select', 'update'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('select')
    	->with(array('idproject' => 123))
    	->will($this->returnValue($resultSet));
    	$mockTableGateway->expects($this->once())
    	->method('update')
    	->with(array('name' => 'The Military Wives', 'description' => 'In My Dreams','budget'=> '100'),
    			array('idproject' => 123));
    
    	$projectsTable = new ProjectsTable($mockTableGateway);
    	$projectsTable->saveProjects($projects);
    }
    
    public function testExceptionIsThrownWhenGettingNonexistentProjects()
    {
    	$resultSet = new ResultSet();
    	$resultSet->setArrayObjectPrototype(new Projects());
    	$resultSet->initialize(array());
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('select'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('select')
    	->with(array('idproject' => 123))
    	->will($this->returnValue($resultSet));
    
    	$projectsTable = new ProjectsTable($mockTableGateway);
    
    	try
    	{
    		$projectsTable->getProjects(123);
    	}
    	catch (\Exception $e)
    	{
    		$this->assertSame('Could not find row 123', $e->getMessage());
    		return;
    	}
    
    	$this->fail('Expected exception was not thrown');
    }
}