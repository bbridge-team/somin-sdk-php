<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Account
{
    /** @var string */
    private $id;
    /** @var string */
    private $username;

    /**
     * Account constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = Utils::get($data, 'id');
        $this->username = Utils::get($data, 'username');
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
}