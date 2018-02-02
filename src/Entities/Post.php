<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Post
{
    /** @var string */
    private $source;
    /** @var string */
    private $id;

    /** @var string */
    private $userId;
    /** @var string */
    private $screenName;

    /** @var string */
    private $text;
    /** @var string */
    private $imageUrl;
    /** @var int */
    private $createdAt;

    /** @var int */
    private $likes;
    /** @var int */
    private $reposts;

    /** @var Location */
    private $location;
    /** @var  */
    private $profile;

    /** @var array */
    private $properties;

    /**
     * Post constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->source = Utils::get($data, 'source');
        $this->id = Utils::get($data, 'id');

        $this->userId = Utils::get($data, 'userId');
        $this->screenName = Utils::get($data, 'screenName');

        $this->text = Utils::get($data, 'text');
        $this->imageUrl = Utils::get($data, 'imageUrl');
        $this->createdAt = Utils::get($data, 'createdAt');

        $this->likes = Utils::get($data, 'likes');
        $this->reposts = Utils::get($data, 'reposts');

        if (isset($data['properties'])) {
            $this->parseProperties($data);
        }
    }

    private function parseProperties($data)
    {
        if (isset($data['location'])) {
            $this->location = new Location($data['location']);
            unset($data['location']);
        }

        if (isset($data['profile'])) {
            $this->profile = new Profile($data['profile']);
            unset($data['profile']);
        }

        $this->properties = $data['properties'];
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @return int
     */
    public function getReposts()
    {
        return $this->reposts;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }
}