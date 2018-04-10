<?php


namespace SoMin\API\UserProfiling\Individual\Responses;

use SoMin\Common\AbstractResponse;

/**
 * Structure to be returned as a result of individual User Profiling API method.
 */
class IndividualUserProfile extends AbstractResponse
{
    /** @var PredictedData */
    private $gender;
    /** @var PredictedData */
    private $ageGroup;
    /** @var PredictedData */
    private $educationLevel;
    /** @var PredictedData */
    private $relationshipStatus;
    /** @var PredictedData */
    private $incomeLevel;
    /** @var PredictedData */
    private $occupationIndustry;

    /** @var PredictedData[] */
    private $mbti = [];

    /**
     * @param $data
     */
    public function setData($data)
    {
        if ($this->getHttpCode() != 200) {
            return;
        }
        if (empty($data['profiling'])) {
            return;
        }

        $profiling = $data['profiling'];
        if (!empty($profiling['gender'])) {
            $this->gender = new PredictedData($profiling['gender']);
        }

        if (!empty($profiling['age_group'])) {
            $this->ageGroup = new PredictedData($profiling['age_group']);
        }

        if (!empty($profiling['education_level'])) {
            $this->educationLevel = new PredictedData($profiling['education_level']);
        }

        if (!empty($profiling['relationship'])) {
            $this->relationshipStatus = new PredictedData($profiling['relationship']);
        }

        if (!empty($profiling['income'])) {
            $this->incomeLevel = new PredictedData($profiling['income']);
        }

        if (!empty($profiling['occupation'])) {
            $this->occupationIndustry = new PredictedData($profiling['occupation']);
        }

        if (!empty($profiling['jp'])) {
            $this->mbti['jp'] = new PredictedData($profiling['jp']);
        }
        if (!empty($profiling['ei'])) {
            $this->mbti['ei'] = new PredictedData($profiling['ei']);
        }
        if (!empty($profiling['tf'])) {
            $this->mbti['tf'] = new PredictedData($profiling['tf']);
        }
        if (!empty($profiling['si'])) {
            $this->mbti['si'] = new PredictedData($profiling['si']);
        }
    }

    /**
     * @return PredictedData
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return PredictedData
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * @return PredictedData
     */
    public function getEducationLevel()
    {
        return $this->educationLevel;
    }

    /**
     * @return PredictedData
     */
    public function getRelationshipStatus()
    {
        return $this->relationshipStatus;
    }

    /**
     * @return PredictedData
     */
    public function getIncomeLevel()
    {
        return $this->incomeLevel;
    }

    /**
     * @return PredictedData
     */
    public function getOccupationIndustry()
    {
        return $this->occupationIndustry;
    }

    /**
     * @return PredictedData[]
     */
    public function getMbti()
    {
        return $this->mbti;
    }
}