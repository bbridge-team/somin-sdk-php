<?php

namespace SoMin\Test;

use SoMin\API\NLP\NLPProcessor;
use SoMin\API\NLP\Requests\NLPUserGeneratedContent;
use SoMin\API\NLP\Responses\NamedEntities;
use SoMin\API\NLP\Responses\POSTags;
use SoMin\API\NLP\Responses\Sentiment;

class NLPTest extends AbstractTest
{
    private $enTestSentences = [
        "Putin is Trump's friend",
        "The weather is good :)"
    ];
    private $zhTestSentences = [
        "什么美丽的画面!",
        "今天是一个非常美好的一天 :)"
    ];

    public function testCanRequestEnglishPOSDetectionAndReceiveResults()
    {
        $this->posTest($this->prepareEnRequest());
    }

    public function testCanRequestChinesePOSDetectionAndReceiveResults()
    {
        $this->posTest($this->prepareZhRequest());
    }

    public function testCanRequestEnglishSentimentDetectionAndReceiveResults()
    {
        $this->sentimentTest($this->prepareEnRequest());
    }

    public function testCanRequestChineseSentimentDetectionAndReceiveResults()
    {
        $this->sentimentTest($this->prepareZhRequest());
    }

    public function testCanRequestEnglishNERDetectionAndReceiveResults()
    {
        $this->nerTest($this->prepareEnRequest());
    }

    public function testCanRequestChineseNERDetectionAndReceiveResults()
    {
        $this->nerTest($this->prepareZhRequest());
    }

    private function posTest(NLPUserGeneratedContent $request)
    {
        $this->authorize();

        $nlpProcessor = new NLPProcessor($this->requester);
        $requestResponse = $nlpProcessor->detectPartsOfSpeech($request);
        $this->assertRequestIDResponse($requestResponse);

        /** @var POSTags $response */
        $response = $this->receiveResponse($requestResponse->getRequestId(), POSTags::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(POSTags::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        foreach ($response->getPOSList() as $tagList) {
            foreach ($tagList as $tag) {
                $this->assertNotEmpty($tag['text']);
                $this->assertNotEmpty($tag['type']);
            }
        }
    }

    private function sentimentTest(NLPUserGeneratedContent $request)
    {
        $this->authorize();

        $nlpProcessor = new NLPProcessor($this->requester);
        $requestResponse = $nlpProcessor->detectSentiment($request);
        $this->assertRequestIDResponse($requestResponse);

        /** @var Sentiment $response */
        $response = $this->receiveResponse($requestResponse->getRequestId(), Sentiment::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(Sentiment::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        foreach ($response->getSentiments() as $sentiment) {
            $this->assertTrue($sentiment >= 0 && $sentiment <= 1);
        }
    }

    private function nerTest(NLPUserGeneratedContent $request)
    {
        $this->authorize();

        $nlpProcessor = new NLPProcessor($this->requester);
        $requestResponse = $nlpProcessor->recognizeNamedEntities($request);
        $this->assertRequestIDResponse($requestResponse);

        /** @var NamedEntities $response */
        $response = $this->receiveResponse($requestResponse->getRequestId(), NamedEntities::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(NamedEntities::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        foreach ($response->getNamedEntities() as $nerList) {
            foreach ($nerList as $ner) {
                $this->assertGreaterThanOrEqual(1, $ner['count']);
                $this->assertNotEmpty($ner['text']);
                $this->assertNotEmpty($ner['type']);
            }
        }
    }

    private function prepareEnRequest()
    {
        return (new NLPUserGeneratedContent())
            ->setSentences($this->enTestSentences)
            ->setLang('en');
    }

    private function prepareZhRequest()
    {
        return (new NLPUserGeneratedContent())
            ->setSentences($this->zhTestSentences)
            ->setLang('zh');
    }
}