<?php
namespace Album\Controller;

use Album\Model\Album;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class RestController extends AbstractRestfulController
{
	protected $albumTable;
	
	public function getAlbumTable()
	{
		if (!$this->albumTable) {
			$sm = $this->getServiceLocator();
			$this->albumTable = $sm->get('Album\Model\AlbumTable');
		}
		return $this->albumTable;
	}
    /**
     * Return list of resources
     *
     * @return mixed
     */
    public function getList()
    {
    	$albums = $this->getAlbumTable()->fetchAll();
    	$data = array();    	
    	foreach ($albums as $album)
    		$data[] = $album;
    	
    	return new JsonModel(array(
    			'album' => $data
    	));
    }
    /**
     * Return single resource
     *
     * @param  mixed $id
     * @return mixed
     */
    public function get($id)
    {
    	$album = $this->getAlbumTable()->getAlbum($id);
    	return new JsonModel(array(
    			'album' => $album
    	));
    }
    /**
     * Create a new resource
     *
     * @param  mixed $data
     * @return mixed
     */
    public function create($data)
    {
    	$album = new Album();
    	$album->exchangeArray($data);
    	$this->getAlbumTable()->saveAlbum($album);
    	return new JsonModel(array(
    			'status' => 'ok'
    	));
    	
    }  
    /**
     * Update an existing resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update($id, $data)
    {    
        $album = $this->getAlbumTable()->getAlbum($id);

		foreach ($data as $key => $value) {
			$album->$key =$value;
		}
    
//     	$album->exchangeArray($data);
    	$this->getAlbumTable()->saveAlbum($album);
    	return new JsonModel(array(
    			'status' => 'ok'
    	));
    }  
    /**
     * Delete an existing resource
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete($id)
    {
    	$this->getAlbumTable()->deleteAlbum($id);
        return new JsonModel(array(
    					'status' => 'ok'
    			));
    }        
}
