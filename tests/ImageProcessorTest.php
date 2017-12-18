<?php

namespace SoMin\Test;

use SoMin\API\ImageProcessing\ImageProcessor;
use SoMin\API\ImageProcessing\Requests\ConceptDetectionData;
use SoMin\API\ImageProcessing\Requests\ObjectDetectionData;
use SoMin\API\ImageProcessing\Responses\ImageConcepts;
use SoMin\API\ImageProcessing\Responses\ImageObjects;

/**
 * @after
 */
class ImageProcessorTest extends AbstractTest
{
    public function testCanRequestObjectDetectionAndReceiveResults()
    {
        $this->authorize();

        $imageProcessor = new ImageProcessor($this->requester);
        $request = (new ObjectDetectionData())
            ->setDetectionThreshold(0.5)
            ->setImageURL('https://github.com/bbridge-team/somin-sdk-php/raw/master/tests/cats.jpg');

        $requestResponse = $imageProcessor->detectImageObjects($request);
        $this->assertRequestIDResponse($requestResponse);

        /** @var ImageObjects $response */
        $response = $this->receiveResponse($requestResponse->getRequestId(), ImageObjects::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(ImageObjects::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        foreach ($response->getObjects() as $object) {
            $this->assertNotEmpty($object['cls_name']);
            $this->assertGreaterThan(0.00001, $object['score']);
        }
    }

    public function testCanRequestConceptDetectionAndReceiveResults()
    {
        $this->authorize();

        $imageProcessor = new ImageProcessor($this->requester);
        $request = (new ConceptDetectionData())
            ->setImageURLs([
                'https://github.com/bbridge-team/somin-sdk-php/raw/master/tests/cats.jpg',
                'https://github.com/bbridge-team/somin-sdk-php/raw/master/tests/dogs.jpg'
            ])
            ->setTopNumToReturn(5);

        $requestResponse = $imageProcessor->detectImageConcepts($request);
        $this->assertRequestIDResponse($requestResponse);

        /** @var ImageConcepts $response */
        $response = $this->receiveResponse($requestResponse->getRequestId(), ImageConcepts::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(ImageConcepts::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertEmpty($response->getError());
        foreach ($response->getDistributions() as $distribution) {
            $this->assertEquals(5, count($distribution['concepts']));

            foreach ($distribution['concepts'] as $concept => $score) {
                $this->assertNotEmpty($concept);
                $this->assertGreaterThan(0.00001, $score);
            }
        }
    }
}