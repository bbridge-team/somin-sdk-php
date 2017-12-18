<?php


namespace SoMin\API\ImageProcessing\Responses;

use SoMin\Common\AbstractResponse;

class ImageObjects extends AbstractResponse
{
    private $objects = [];

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() == 200) {
            $this->objects = $data['objects'];
        }
    }

    /**
     * @return array
     */
    public function getObjects()
    {
        return $this->objects;
    }
}