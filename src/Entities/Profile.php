<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Profile
{
    /** @var string */
    private $firstName;
    /** @var string */
    private $lastName;
    /** @var string */
    private $gender;

    /**
     * Profile constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->firstName = Utils::get($data, 'firstName');
        $this->lastName = Utils::get($data, 'lastName');
        $this->gender = Utils::get($data, 'gender');
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
    public function getGender()
    {
        return $this->gender;
    }
}