<?php


namespace SoMin\API\ImageProcessing\Responses;

use SoMin\Common\AbstractResponse;

/**
 * Structure to be returned as a result of Image Object Detection API method.
 */
class ImageObjects extends AbstractResponse
{
    private $error;
    private $objects = [];

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }

        $this->objects = $data['objects'];
    }

    /**
     * Error message if request went wrong. Null if request is successful.
     *
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Detected objects from an image.
     *
     * @return array
     */
    public function getObjects()
    {
        return $this->objects;
    }
}