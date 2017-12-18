<?php

use SoMin\API\Authorization\CredentialsAuthorizer;
use SoMin\API\Authorization\Requests\UserCredential;
use SoMin\Common\SimpleHttpRequester;

define('USERNAME', getenv('TEST_USERNAME'));
define('PASSWORD', getenv('TEST_PASSWORD'));
$token = getenv('TEST_TOKEN');
if ($token === false) {
    $request = (new UserCredential())
        ->setUsername(USERNAME)
        ->setPassword(PASSWORD);

    $requester = new SimpleHttpRequester();
    $authorizer = new CredentialsAuthorizer($requester);

    $response = $authorizer->auth($request);
    $token = $response->getToken();
}
define('TOKEN', $token);