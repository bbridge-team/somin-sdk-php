<?php

namespace SoMin\Test;

use SoMin\API\Authorization\CredentialsAuthorizer;
use SoMin\API\Authorization\Requests\UserCredential;
use SoMin\API\Authorization\Responses\UserToken;

class AuthorizationTest extends AbstractTest
{
    public function testCanRequestAuthorizationTokenForUserNameAndPassword()
    {
        $authorizer = new CredentialsAuthorizer($this->requester);

        $request = (new UserCredential())
            ->setUsername(USERNAME)
            ->setPassword(PASSWORD);

        $response = $authorizer->auth($request);

        $this->assertInstanceOf(UserToken::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getToken());
    }
}