<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Follower
{
    /** @var int|null */
    private $id;

    /** @var string|null */
    private $screenName;

    /** @var string */
    private $source;

    /**
     * InstagramFollower constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = Utils::get($data, 'id');
        $this->screenName = Utils::get($data, 'screenName');
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Follower
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }
}