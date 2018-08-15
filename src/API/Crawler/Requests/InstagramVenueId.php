<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Crawler Instagram Venue request.
 */
class InstagramVenueId extends AbstractRequest
{
    /**
     * Venue Id in Instagram.
     *
     * @param int $venueId
     * @return InstagramVenueId
     */
    public function setVenueId($venueId)
    {
        $this->data['venue_id'] = $venueId;
        return $this;
    }
}