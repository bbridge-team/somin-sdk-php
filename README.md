# somin-sdk-php

SoMin API SDK for Somin API is a PHP library for making calls to [Somin API](http://dev.somin.ai). The library enables users for making API calls from PHP 5.6 or high.

[![Build Status](https://travis-ci.org/bbridge-team/somin-sdk-php.svg?branch=master)](https://travis-ci.org/bbridge-team/somin-sdk-php)

## Example

```php
$requester = new SimpleHttpRequester();
$authorizer = new CredentialsAuthorizer($requester);

$tokenRequest = (new UserCredential())
                        ->setUsername(USERNAME)
                        ->setPassword(PASSWORD);

// Call authorization method
$tokenResponse = $authorizer->auth($tokenRequest);

// Set bearer token to current HttpRequester
$requester->setBearer($tokenResponse->getToken());

$request = (new UserProfileData())
             ->setTexts([
                 "Hello friend!",
                 "The weather is good :)"
             ])
             ->setImageURLs([
                 "https://pbs.twimg.com/media/C6ij4CLUwAAxu9r.jpg",
                 "https://pbs.twimg.com/media/C6jO3UiVoAQYc_8.jpg"
             ])
             ->setLang('en')
             ->withAgeGroup()
             ->withEducationLevel()
             ->withGender()
             ->withIncome()
             ->withOccupation()
             ->withRelationship();
             
$userProfiler = new IndividualUserProfiler($requester);

// Call individual user profile method and get request id
$requestResponse = $userProfiler->predictIndividualUserProfile($request);

$request = (new ResponseRequest())
            ->setRequestID($requestResponse->getRequestId())
            ->setResponseClass(IndividualUserProfile::class);
            
// Call method for check current request status
$commonProcessor = new CommonProcessor($this->requester);

$numAttempts = 10;
$response = null;   /** @var $response IndividualUserProfile */

while($numAttempts-- > 0 && ($response == null || $response->getHttpCode() !== 200)) {
    sleep(self::RESPONSE_WAIT_TIME_SECONDS);
    $response = $commonProcessor->response($request);
}

var_dump($response);
```

## Testing
- Install [PHP Unit](https://phpunit.de/)
- Set environment variables **TEST_USERNAME** and **TEST_PASSWORD** to SoMin API user name and password, respectively.
- run **phpunit** in main directory