<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Account
{
    /** @var string */
    private $id;
    /** @var string */
    private $username;
    /** @var string */
    private $firstName;
    /** @var string */
    private $lastName;
    /** @var string */
    private $fullName;
    /** @var string */
    private $gender;
    /** @var string */
    private $avatar;

    /** @var array */
    private $attributes;

    /**
     * Account constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = Utils::get($data, 'id');
        $this->username = Utils::get($data, 'username');

        $attributes = isset($data['attributes']) ? $data['attributes'] : [];

        $this->firstName = Utils::getWithUnset($attributes, 'firstName');
        $this->lastName = Utils::getWithUnset($attributes, 'lastName');
        $this->gender = Utils::getWithUnset($attributes, 'gender');
        $this->avatar = Utils::getWithUnset($attributes, 'avatar');
        $this->fullName = Utils::getWithUnset($attributes, 'name');

        $this->attributes = $attributes;
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}