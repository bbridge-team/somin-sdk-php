<?php

namespace SoMin\API\Crawler\Responses;

use SoMin\Common\AbstractResponse;

class InstagramVenueResponse extends AbstractResponse
{
    /** @var string */
    private $venueId;

    /** @var string */
    private $name;

    /** @var float */
    private $lat;

    /** @var float */
    private $lng;

    /**
     * @param $data
     */
    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->venueId = $data['id'];
        $this->name = $data['name'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
    }

    /**
     * @return string
     */
    public function getVenueId()
    {
        return $this->venueId;
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
}