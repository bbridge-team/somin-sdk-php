<?php

namespace SoMin\Entities;

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

    /** @var array */
    private $properties;

    /**
     * Post constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data['source'])) {
            $this->source = $data['source'];
        }
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        if (isset($data['userId'])) {
            $this->userId = $data['userId'];
        }
        if (isset($data['screenName'])) {
            $this->screenName = $data['screenName'];
        }

        if (isset($data['text'])) {
            $this->text = $data['text'];
        }
        if (isset($data['imageUrl'])) {
            $this->imageUrl = $data['imageUrl'];
        }
        if (isset($data['createdAt'])) {
            $this->createdAt = (int) $data['createdAt'];
        }

        if (isset($data['likes'])) {
            $this->likes = (int) $data['likes'];
        }
        if (isset($data['reposts'])) {
            $this->reposts = (int) $data['reposts'];
        }

        if (isset($data['properties'])) {
            $this->properties = $data['properties'];
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
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }
}