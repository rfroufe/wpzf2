<?php

namespace Cheetara\Entity;

interface CheatInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getIdcheat();

    /**
     * Set id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setIdcheat($idcheat);

    /**
     * Get username.
     *
     * @return string
     */
    public function getName();

    /**
     * Set username.
     *
     * @param string $username
     * @return UserInterface
     */
    public function setName($username);

    /**
     * Get email.
     *
     * @return string
     */
    public function getCode();

    /**
     * Set email.
     *
     * @param string $email
     * @return UserInterface
     */
    public function setCode($code);

    /**
     * Get displayName.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set displayName.
     *
     * @param string $displayName
     * @return UserInterface
     */
    public function setDescription($description);

    /**
     * Get password.
     *
     * @return string password
     */
    public function getFilename();

    /**
     * Set password.
     *
     * @param string $password
     * @return UserInterface
     */
    public function setFilename($filename);

    /**
     * Get state.
     *
     * @return int
     */
    public function getCategories_idcategory();

    /**
     * Set state.
     *
     * @param int $state
     * @return UserInterface
     */
    public function setCategories_idcategory($categories_idcategory);

}
