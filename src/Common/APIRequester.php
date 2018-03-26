<?php


namespace SoMin\Common;


use SoMin\Common\Interfaces\HttpRequesterInterface;

abstract class APIRequester
{
    const API_VERSION   = '1';
    const API_HOST      = 'http://somin.online:1030';

    private $requester = null;
    private $host = null;
    private $version = null;

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
        return $this->getHost() . '/v' . $this->getVersion() . '/' . $urlSuffix;
    }

    /**
     * @return null
     */
    public function getHost()
    {
        if (empty($this->host)) {
            $this->host = self::API_HOST;
        }

        return $this->host;
    }

    /**
     * @param null $host
     * @return APIRequester
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return null
     */
    public function getVersion()
    {
        if (empty($this->version)) {
            $this->version = self::API_VERSION;
        }

        return $this->version;
    }

    /**
     * @param null $version
     * @return APIRequester
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }
}