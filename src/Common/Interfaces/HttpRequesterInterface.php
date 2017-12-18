<?php


namespace SoMin\Common\Interfaces;


use SoMin\Common\AbstractRequest;
use SoMin\Common\AbstractResponse;

interface HttpRequesterInterface
{
    function request($urlSuffix, $method, AbstractRequest $data, AbstractResponse $response);
}