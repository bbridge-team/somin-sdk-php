<?php

namespace SoMin\Entities;

use SoMin\Utils;

class Location
{
    /** @var string */
    private $id;
    /** @var string */
    private $name;
    /** @var float */
    private $lat;
    /** @var float */
    private $lng;
    /** @var array */
    private $categories = [];

    /**
     * Location constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = Utils::get($data, 'id');
        $this->name = Utils::get($data, 'name');
        $this->lat = Utils::get($data, 'lat');
        $this->lng = Utils::get($data, 'lng');

        $this->categories = Utils::get($data, 'categories');
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }
}