<?php

namespace SoMin\Entities;

class InstagramFollower
{
    /** @var int */
    private $id;

    /**
     * TwitterFollower constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}