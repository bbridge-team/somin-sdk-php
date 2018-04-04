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
    private $timeZoneOffset;

    /** @var int */
    private $likes;
    /** @var int */
    private $reposts;

    /** @var Location */
    private $location;

    /** @var array */
    private $properties;

    /**
     * Post constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->source = Utils::getWithUnset($data, 'source');
        $this->id = Utils::getWithUnset($data, 'id');

        $this->userId = Utils::getWithUnset($data, 'userId');
        $this->screenName = Utils::getWithUnset($data, 'screenName');

        $this->text = Utils::getWithUnset($data, 'text');
        $this->imageUrl = Utils::getWithUnset($data, 'imageUrl');
        $this->createdAt = Utils::getWithUnset($data, 'createdAt');

        $this->timeZoneOffset = Utils::getWithUnset($data, 'timeZoneOffset');

        $this->likes = Utils::getWithUnset($data, 'likes');
        $this->reposts = Utils::getWithUnset($data, 'reposts');

        $this->properties = Utils::get($data, 'properties');

        if (isset($data['location'])) {
            $this->location = new Location($data['location']);
        }
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
    public function getTimeZoneOffset()
    {
        return $this->timeZoneOffset;
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
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }
}