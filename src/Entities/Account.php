<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Account
{
    /** @var string */
    private $id;
    /** @var string */
    private $username;
    /** @var string|null */
    private $fullName;
    /** @var string|null */
    private $gender;
    /** @var string|null */
    private $biography;
    /** @var string|null */
    private $locationNote;

    /** @var \DateTime|null */
    private $birthdayAt;
    /** @var \DateTime|null */
    private $joinedAt;

    /** @var string|null */
    private $avatarUrl;
    /** @var string|null */
    private $personalUrl;

    /** @var bool|null */
    private $isVerified;
    /** @var bool|null */
    private $isPrivate;

    /** @var int|null */
    private $numFollowedBy;
    /** @var int|null */
    private $numFollows;
    /** @var int|null */
    private $numLikes;
    /** @var int|null */
    private $numMoments;
    /** @var int|null */
    private $numPosts;
    /** @var int|null */
    private $numLists;

    /** @var string|null */
    private $device;
    /** @var array */
    private $phoneNumbers = [];
    /** @var array */
    private $emails = [];

    /** @var array */
    private $attributes;

    /**
     * Account constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = Utils::get($data, 'id');
        $this->username = Utils::get($data, 'username');

        $attributes = isset($data['attributes']) ? $data['attributes'] : [];

        $this->gender = Utils::getWithUnset($attributes, 'gender');
        $this->fullName = Utils::getWithUnset($attributes, 'name');
        $this->biography = Utils::getWithUnset($attributes, 'biography');
        $this->locationNote = Utils::getWithUnset($attributes, 'locationNote');

        $this->avatarUrl = Utils::getWithUnset($attributes, 'avatarUrl');
        $this->personalUrl = Utils::getWithUnset($attributes, 'personalUrl');

        if (isset($attributes['birthdayAt'])) {
            $this->birthdayAt = new \DateTime('@'.Utils::getWithUnset($attributes, 'birthdayAt') / 1000);
        }
        if (isset($attributes['joinedAt'])) {
            $this->joinedAt = new \DateTime('@'.Utils::getWithUnset($attributes, 'joinedAt') / 1000);
        }

        $this->isVerified = Utils::getWithUnset($attributes, 'isVerified');
        $this->isPrivate = Utils::getWithUnset($attributes, 'isPrivate');

        $this->numFollowedBy = Utils::getWithUnset($attributes, 'numFollowedBy');
        $this->numFollows = Utils::getWithUnset($attributes, 'numFollows');
        $this->numLikes = Utils::getWithUnset($attributes, 'numLikes');
        $this->numMoments = Utils::getWithUnset($attributes, 'numMoments');
        $this->numPosts = Utils::getWithUnset($attributes, 'numPosts');
        $this->numLists = Utils::getWithUnset($attributes, 'numLists');

        $this->device = Utils::getWithUnset($attributes, 'device');
        $this->phoneNumbers = Utils::getWithUnset($attributes, 'phoneNumbers');
        $this->emails = Utils::getWithUnset($attributes, 'emails');

        $this->attributes = $attributes;
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

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return null|string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @return null|string
     */
    public function getLocationNote()
    {
        return $this->locationNote;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthdayAt()
    {
        return $this->birthdayAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getJoinedAt()
    {
        return $this->joinedAt;
    }

    /**
     * @return null|string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @return null|string
     */
    public function getPersonalUrl()
    {
        return $this->personalUrl;
    }

    /**
     * @return bool|null
     */
    public function getisVerified()
    {
        return $this->isVerified;
    }

    /**
     * @return bool|null
     */
    public function getisPrivate()
    {
        return $this->isPrivate;
    }

    /**
     * @return int|null
     */
    public function getNumFollowedBy()
    {
        return $this->numFollowedBy;
    }

    /**
     * @return int|null
     */
    public function getNumFollows()
    {
        return $this->numFollows;
    }

    /**
     * @return int|null
     */
    public function getNumLikes()
    {
        return $this->numLikes;
    }

    /**
     * @return int|null
     */
    public function getNumMoments()
    {
        return $this->numMoments;
    }

    /**
     * @return int|null
     */
    public function getNumPosts()
    {
        return $this->numPosts;
    }

    /**
     * @return int|null
     */
    public function getNumLists()
    {
        return $this->numLists;
    }

    /**
     * @return null|string
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @return array
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    /**
     * @return array
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}