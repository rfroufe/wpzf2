<?php
namespace Projects\Model;

use Zend\Db\TableGateway\TableGateway;

class ProjectsTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function getProjects($idproject)
	{
		$idproject  = (int) $idproject;
		$rowset = $this->tableGateway->select(array('idproject' => $idproject));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $idproject");
		}
		return $row;
	}

	public function saveProjects(Projects $projects)
	{
		$data = array(
				'name' => $projects->name,
				'description'  => $projects->description,
		);

		$idproject = (int) $projects->id;
		if ($idproject == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getProjects($idproject)) {
				$this->tableGateway->update($data, array('idproject' => $idproject));
			} else {
				throw new \Exception('Projects id does not exist');
			}
		}
	}

	public function deleteProjects($idproject)
	{
		$this->tableGateway->delete(array('idproject' => (int) $idproject));
	}
}