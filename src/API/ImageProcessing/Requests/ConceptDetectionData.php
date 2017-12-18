<?php


namespace SoMin\API\ImageProcessing\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Structure to be send in Object Detection request.
 */
class ConceptDetectionData extends AbstractRequest
{
    /**
     * Image URLS to be detected from.
     *
     * @param array $imageURLs
     * @return $this
     */
    public function setImageURLs(array $imageURLs)
    {
        $this->data['image_urls'] = $imageURLs;
        return $this;
    }

    /**
     * Number of Objects top TopNumToReturn detected objects to return (based on model confidence).
     *
     * @param $topNumToReturn
     * @return $this
     */
    public function setTopNumToReturn($topNumToReturn)
    {
        $this->data['count'] = $topNumToReturn;
        return $this;
    }
}