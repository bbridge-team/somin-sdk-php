<?php

namespace SoMin\Test;

use SoMin\API\UserProfiling\Individual\IndividualUserProfiler;
use SoMin\API\UserProfiling\Individual\Requests\UserProfileData;
use SoMin\API\UserProfiling\Individual\Responses\IndividualUserProfile;

class IndividualUserProfilingTest extends AbstractTest
{
    public function testCanRequestCompleteUserProfileAndReceiveResults()
    {
        $this->authorize();

        $userProfiler = new IndividualUserProfiler($this->requester);
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
            ->withRelationship()
            ->withMBTI();

        $requestResponse = $userProfiler->predictIndividualUserProfile($request);
        $this->assertRequestIDResponse($requestResponse);

        /** @var IndividualUserProfile $response */
        $response = $this->receiveResponse($requestResponse->getRequestId(), IndividualUserProfile::class);
        $this->assertNotNull($response);
        $this->assertInstanceOf(IndividualUserProfile::class, $response);
        $this->assertEquals(200, $response->getHttpCode());
        $this->assertNotEmpty($response->getAgeGroup());
        $this->assertNotEmpty($response->getEducationLevel());
        $this->assertNotEmpty($response->getGender());
        $this->assertNotEmpty($response->getIncomeLevel());
        $this->assertNotEmpty($response->getOccupationIndustry());
        $this->assertNotEmpty($response->getRelationshipStatus());
    }
}