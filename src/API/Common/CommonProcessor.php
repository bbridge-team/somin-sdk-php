<?php


namespace SoMin\API\Common;

use SoMin\API\Common\Requests\ResponseRequest;
use SoMin\Common\APIRequester;

class CommonProcessor extends APIRequester
{
    public function response(ResponseRequest $request)
    {
        return $this->get('response', $request, $request->getResponseClass());
    }
}