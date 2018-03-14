<?php

namespace SoMin\Entities;

use SoMin\Utils;

class TwitterFollower
{
    /** @var int */
    private $id;

    /**
     * TwitterFollower constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = Utils::get($data, 'id');;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}