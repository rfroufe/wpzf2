<?php

namespace Cheetara\Entity;

class Cheats implements CheatInterface
{
    /**
     * @var int
     */
    protected $idcheat;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var int
     */
    protected $categories_idcategory;

  

    /**
     * Get id.
     *
     * @return int
     */
    public function getIdcheat()
    {
        return $this->idcheat;
    }

    /**
     * Set idcheat.
     *
     * @param int $idcheat
     * @return CheatInterface
     */
    public function setIdcheat($idcheat)
    {
        $this->idcheat = (int) $idcheat;
        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set username.
     *
     * @param string $name
     * @return CheatInterface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getCode()
    {
    	return $this->code;
    }
    
    /**
     * Set username.
     *
     * @param string $name
     * @return CheatInterface
     */
    public function setCode($code)
    {
    	$this->code = $code;
    	return $this;
    }    

    /**
     * Get email.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description.
     *
     * @param string $description
     * @return CheatInterface
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set filename.
     *
     * @param string $filename
     * @return CheatInterface
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * Get categories_idcategory.
     *
     * @return int
     */
    public function getCategories_idcategory()
    {
        return $this->categories_idcategory;
    }

    /**
     * Set categories_idcategory.
     *
     * @param string $categories_idcategory
     * @return CheatInterface
     */
    public function setCategories_idcategory($categories_idcategory)
    {
        $this->categories_idcategory = $categories_idcategory;
        return $this;
    }

    
}
