<?php
namespace Album\Controller;

use Album\Model\Album;
use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractActionController;
use Album\Form\AlbumForm;

class ClientController extends AbstractActionController
{
	public function indexAction()
	{
		
	}
    public function addAction()
    {
         $form = new AlbumForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $album = new Album();
             $form->setInputFilter($album->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $album->exchangeArray($form->getData());
                 $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('album');
             }
         }
         return array('form' => $form);
    } 
    public function editAction()
    {
    	
    }
}
