<?php

namespace SoMin\Test;

use SoMin\API\Common\CommonProcessor;
use SoMin\API\Common\Requests\ResponseRequest;
use SoMin\Common\AbstractResponse;
use SoMin\Common\RequestIDResponse;
use SoMin\Common\SimpleHttpRequester;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    const RESPONSE_WAIT_TIME_SECONDS = 1;
    const RESPONSE_WAIT_NUM_ATTEMPTS = 30;

    /** @var SimpleHttpRequester */
    protected $requester;

    /** @var int */
    protected $numAttempts;

    protected function setUp()
    {
        $this->requester = new SimpleHttpRequester();
        $this->numAttempts = self::RESPONSE_WAIT_NUM_ATTEMPTS;
    }

    protected function authorize()
    {
        $this->requester->setBearer(TOKEN);
    }

    protected function assertRequestIDResponse($response)
    {
        $this->assertNotNull($response);
        /** @var $response RequestIDResponse */
        $this->assertInstanceOf(RequestIDResponse::class, $response);
        $this->assertEquals(202, $response->getHttpCode());
        $this->assertRegExp('/^\{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}\}?$/', $response->getRequestId());
    }

    protected function receiveResponse($requestId, $responseClass)
    {
        $request = (new ResponseRequest())
            ->setRequestID($requestId)
            ->setResponseClass($responseClass);

        $commonProcessor = new CommonProcessor($this->requester);

        $numAttempts = $this->numAttempts;
        $response = null;   /** @var $response AbstractResponse */

        while($numAttempts-- > 0 && ($response == null || $response->getHttpCode() === 202)) {
            sleep(self::RESPONSE_WAIT_TIME_SECONDS);
            $response = $commonProcessor->response($request);
        }

        return $response;
    }
}