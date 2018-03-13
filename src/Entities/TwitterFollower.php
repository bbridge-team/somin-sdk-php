<?php

namespace SoMin\Entities;

use SoMin\Utils;

class TwitterFollower
{
    /** @var int */
    private $id;

    /** @var string */
    private $screenName;

    /** @var string */
    private $profilePicUrl;

    /** @var string */
    private $fullName;

    /**
     * TwitterFollower constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = Utils::get($data, 'id');
        $this->screenName = Utils::get($data, 'screenName');
        $this->profilePicUrl = Utils::get($data, 'profilePicUrl');
        $this->fullName = Utils::get($data, 'fullName');
    }

    /**
     * @return string
     */
    public function getProfilePicUrl()
    {
        return $this->profilePicUrl;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getScreenName()
    {
        return $this->screenName;
    }
}