<?php
namespace Projects\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Projects\Model\Projects;
use Projects\Form\ProjectsForm;

class IndexController extends AbstractActionController
{
	protected $projectsTable;
	
	public function getProjectsTable()
	{
		if (!$this->projectsTable) {
			$sm = $this->getServiceLocator();
			$this->projectsTable = $sm->get('Projects\Model\ProjectsTable');
		}
		return $this->projectsTable;
	}
	
	public function indexAction()
    {
    	return new ViewModel(array(
    			'projects' => $this->getProjectsTable()->fetchAll(),
    	));
    }
    
	public function addAction()
     {
         $form = new ProjectsForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $projects = new Projects();
             $form->setInputFilter($projects->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $projects->exchangeArray($form->getData());
                 $this->getProjectsTable()->saveProjects($projects);

                 // Redirect to list of projectss
                 return $this->redirect()->toRoute('projects');
             }
         }
         return array('form' => $form);
     }
    
    public function editAction()
    {
         $idproject = (int) $this->params()->fromRoute('idproject', 0);
         if (!$idproject) {
             return $this->redirect()->toRoute('projects', array(
                 'action' => 'add'
             ));
         }

         // Get the Projects with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $projects = $this->getProjectsTable()->getProjects($idproject);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('projects', array(
                 'action' => 'index'
             ));
         }

         $form  = new ProjectsForm();
         $form->bind($projects);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($projects->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getProjectsTable()->saveProjects($projects);

                 // Redirect to list of projectss
                 return $this->redirect()->toRoute('projects');
             }
         }

         return array(
             'idproject' => $idproject,
             'form' => $form,
         );
    }
    
	public function deleteAction()
    {
         $idproject = (int) $this->params()->fromRoute('idproject', 0);
         if (!$idproject) {
             return $this->redirect()->toRoute('projects');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $idproject = (int) $request->getPost('idproject');
                 $this->getProjectsTable()->deleteProjects($idproject);
             }

             // Redirect to list of projectss
             return $this->redirect()->toRoute('projects');
         }

         return array(
             'idproject'    => $idproject,
             'projects' => $this->getProjectsTable()->getProjects($idproject)
         );
    }
    
}
