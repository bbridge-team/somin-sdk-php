<?php


namespace SoMin\API\ImageProcessing;


use SoMin\API\ImageProcessing\Requests\ConceptDetectionData;
use SoMin\Common\APIRequester;
use SoMin\Common\RequestIDResponse;
use SoMin\API\ImageProcessing\Requests\ObjectDetectionData;

/**
 * Image processing API capabilities.
 */
class ImageProcessor extends APIRequester
{
    /**
     * Performs Object detection API request.
     *
     * @param ObjectDetectionData $imagesData Image to detect objects from.
     * @return RequestIDResponse
     */
    public function detectImageObjects(ObjectDetectionData $imagesData)
    {
        return $this->post('image/objects', $imagesData, RequestIDResponse::class);
    }

    /**
     * Performs Image concept detection API request.
     *
     * @param ConceptDetectionData $imagesData Images to detect concepts from.
     * @return RequestIDResponse
     */
    public function detectImageConcepts(ConceptDetectionData $imagesData)
    {
        return $this->post('image/concepts', $imagesData, RequestIDResponse::class);
    }
}