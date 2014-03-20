<?php
namespace Projects\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
 

class ProjectsController extends AbstractActionController
{
	protected $projectsTable;
	
 	public function indexAction()
 	{
         return new ViewModel(array(
             'projects' => $this->getProjectsTable()->fetchAll(),
         ));
 	}
 
 	public function addAction()
 	{
 		return new ViewModel();
 	}
 
 	public function editAction()
 	{
 		return new ViewModel();
 	}
 
 	public function deleteAction()
 	{
 		return new ViewModel();
 	}
 	
 	
 	public function getProjectsTable()
 	{
 		if (!$this->projectsTable) {
 			$sm = $this->getServiceLocator();
 			$this->projectsTable = $sm->get('Projects\Model\ProjectsTable');
 		}
 		return $this->projectsTable;
 	}
}