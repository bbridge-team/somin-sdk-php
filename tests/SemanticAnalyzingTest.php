<?php

namespace SoMin\Test;

use SoMin\API\SemanticAnalyzing\Requests\TopicsDataRequest;
use SoMin\API\SemanticAnalyzing\Responses\DetectedTopicsResponse;
use SoMin\API\SemanticAnalyzing\SemanticAnalyzingProcessor;

class SemanticAnalyzingTest extends AbstractTest
{
    public function testCanRequestCompleteUserProfileAndReceiveResults()
    {
        $this->authorize();

        $semanticAnalyzingProcessor = new SemanticAnalyzingProcessor($this->requester);
        $request = (new TopicsDataRequest())
            ->setDocuments([
                [
                    "Cat is so cute!",
                    "Scarlet is a very good person"
                ],
                [
                    "Scarlet is so cute!",
                    "Cat is a very good animal"
                ]
            ])
            ->setTopicsNumber(5)
            ->setDomain('general')
            ->setLang('en');

        $requestResponse = $semanticAnalyzingProcessor->hotTopicsDetection($request);
        $this->assertRequestIDResponse($requestResponse);

        // Increase num attempts for a long task
        $this->numAttempts += 10;

        /** @var DetectedTopicsResponse $response */
        $response = $this->receiveResponse($requestResponse->getRequestId(), DetectedTopicsResponse::class);
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getTopicsList());
        foreach ($response->getTopicsList() as $document) {
            $this->assertEquals(5, count($document['topics']));
        }
    }
}