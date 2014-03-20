<?php

namespace Cheetara\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use ZfcBase\Form\ProvidesEventsForm;

class Cheats extends ProvidesEventsForm
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'code',
            'options' => array(
                'label' => 'Code',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'description',
            'options' => array(
                'label' => 'Description',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'filename',
            'options' => array(
                'label' => 'Filename',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'categories_idcategory',
            'options' => array(
                'label' => 'Id Category',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

      
        $this->add(array(
            'name' => 'idcheat',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => array(
                'type' => 'hidden'
            ),
        ));
        

        $submitElement = new Element\Button('submit');
        $submitElement
        ->setLabel('Submit')
        ->setAttributes(array(
        		'type'  => 'submit',
        ));
        
        $this->add($submitElement, array(
        		'priority' => -100,
        ));

        // @TODO: Fix this... getValidator() is a protected method.
        //$csrf = new Element\Csrf('csrf');
        //$csrf->getValidator()->setTimeout($this->getRegistrationOptions()->getUserFormTimeout());
        //$this->add($csrf);
    }
}
