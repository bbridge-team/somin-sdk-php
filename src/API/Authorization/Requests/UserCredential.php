<?php


namespace SoMin\API\Authorization\Requests;


use SoMin\Common\AbstractRequest;

class UserCredential extends AbstractRequest
{
    public function setUsername($username)
    {
        $this->data['username'] = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->data['password'] = $password;
        return $this;
    }
}