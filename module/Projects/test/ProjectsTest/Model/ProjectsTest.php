<?php
namespace ProjectsTest\Model;

use Projects\Model\Projects;
use PHPUnit_Framework_TestCase;

class ProjectsTest extends PHPUnit_Framework_TestCase
{
	public function testProjectsInitialState()
	{
		$projects = new Projects();

		$this->assertNull($projects->name, '"name" should initially be null');
		$this->assertNull($projects->idproject, '"idproject" should initially be null');
		$this->assertNull($projects->description, '"description" should initially be null');
	}

	public function testExchangeArraySetsPropertiesCorrectly()
	{
		$projects = new Projects();
		$data  = array('name' => 'some name',
				'idproject'     => 123,
				'description'  => 'some description');

		$projects->exchangeArray($data);

		$this->assertSame($data['name'], $projects->name, '"name" was not set correctly');
		$this->assertSame($data['idproject'], $projects->idproject, '"idproject" was not set correctly');
		$this->assertSame($data['description'], $projects->description, '"description" was not set correctly');
	}

	public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
	{
		$projects = new Projects();

		$projects->exchangeArray(array('name' => 'some name',
				'idproject'     => 123,
				'description'  => 'some description'));
		$projects->exchangeArray(array());

		$this->assertNull($projects->name, '"name" should have defaulted to null');
		$this->assertNull($projects->idproject, '"idproject" should have defaulted to null');
		$this->assertNull($projects->description, '"description" should have defaulted to null');
	}
}