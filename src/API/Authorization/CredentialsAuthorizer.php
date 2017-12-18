<?php


namespace SoMin\API\Authorization;


use SoMin\API\Authorization\Requests\UserCredential;
use SoMin\API\Authorization\Responses\UserToken;
use SoMin\Common\APIRequester;

class CredentialsAuthorizer extends APIRequester
{
    /**
     * @param UserCredential $request
     * @return UserToken
     */
    public function auth(UserCredential $request)
    {
        return $this->post('auth', $request, UserToken::class);
    }
}