<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Follower
{
    /** @var int|null */
    private $id;

    /** @var string|null */
    private $screenName;

    /** @var string|null */
    private $profilePicURL;

    /** @var string|null */
    private $fullName;

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
        $this->fullName = Utils::get($data, 'fullName');
        $this->profilePicURL = Utils::get($data, 'profilePicUrl');
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

    /**
     * @return null|string
     */
    public function getProfilePicURL()
    {
        return $this->profilePicURL;
    }

    /**
     * @param null|string $profilePicURL
     * @return Follower
     */
    public function setProfilePicURL($profilePicURL)
    {
        $this->profilePicURL = $profilePicURL;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param null|string $fullName
     * @return Follower
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }
}