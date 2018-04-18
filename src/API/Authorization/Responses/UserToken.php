<?php

namespace SoMin\API\Authorization\Responses;

use SoMin\Common\AbstractResponse;

class UserToken extends AbstractResponse
{
    /** @var string */
    private $token;

    /**
     * @param $data
     */
    public function setData($data)
    {
        parent::setData($data);

        if (!empty($data['token'])) {
            $this->token = $data['token'];
        }
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}