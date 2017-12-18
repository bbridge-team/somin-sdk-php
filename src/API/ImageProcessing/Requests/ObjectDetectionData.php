<?php


namespace SoMin\API\ImageProcessing\Requests;

use SoMin\Common\AbstractRequest;

/**
 * Input structure for Image Object Detection.
 */
class ObjectDetectionData extends AbstractRequest
{
    /**
     * URL of the image.
     * @param $imageUrl
     * @return $this
     */
    public function setImageURL($imageUrl)
    {
        $this->data['url'] = $imageUrl;
        return $this;
    }

    /**
     * Threshold to cut image detection results that confidence is lower than the threshold.
     * @param $threshold
     * @return $this
     */
    public function setDetectionThreshold($threshold)
    {
        $this->data['threshold'] = $threshold;
        return $this;
    }
}