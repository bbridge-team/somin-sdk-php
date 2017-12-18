<?php


namespace SoMin\Common;


use SoMin\Common\Interfaces\HttpRequesterInterface;

abstract class APIRequester
{
    const API_VERSION   = '1';
    const API_HOST      = 'http://somin.online:1024';

    private $requester = null;

    /**
     * APIRequester constructor.
     * @param HttpRequesterInterface $requester
     */
    public function __construct(HttpRequesterInterface $requester)
    {
        $this->requester = $requester;
    }

    protected function post($urlSuffix, AbstractRequest $request, $responseClass)
    {
        return $this->makeResponse($urlSuffix, 'POST', $request, $responseClass);
    }

    protected function get($urlSuffix, AbstractRequest $request, $responseClass)
    {
        return $this->makeResponse($urlSuffix, 'GET', $request, $responseClass);
    }

    protected function makeResponse($urlSuffix, $method, AbstractRequest $request, $responseClass)
    {
        $response = new $responseClass;

        return $this->requester->request($this->buildUrl($urlSuffix), $method, $request, $response);
    }

    private function buildUrl($urlSuffix)
    {
        return self::API_HOST . '/v' . self::API_VERSION . '/' . $urlSuffix;
    }
}