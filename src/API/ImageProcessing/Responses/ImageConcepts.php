<?php


namespace SoMin\API\ImageProcessing\Responses;

use SoMin\Common\AbstractResponse;

/**
 * Structure to be returned as a result of Image Concept Detection API method.
 */
class ImageConcepts extends AbstractResponse
{
    private $distributions;

    /**
     * @param $data
     */
    public function setData($data)
    {
        parent::setData($data);

        if ($this->getHttpCode() == 200) {
            $this->distributions = $data['results'];
        }
    }

    /**
     * Concept distribution.
     *
     * @return array
     */
    public function getDistributions()
    {
        return $this->distributions;
    }
}