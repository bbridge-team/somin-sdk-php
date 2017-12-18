<?php


namespace SoMin\API\UserProfiling\Individual\Requests;


use SoMin\Common\AbstractRequest;

/**
 * Creates the structure with the specified texts and image urls.
 */
class UserProfileData extends AbstractRequest
{
    /**
     * User-generated texts.
     *
     * @param array $texts
     * @return $this
     */
    public function setTexts(array $texts)
    {
        $this->data['text'] = $texts;
        return $this;
    }

    /**
     * User-generated image URLs.
     *
     * @param array $imageURLs
     * @return $this
     */
    public function setImageURLs(array $imageURLs)
    {
        $this->data['image_urls'] = $imageURLs;
        return $this;
    }

    /**
     * Defines the language of individual user profiler.
     * Currently, only English language is supported.
     * @param $lang
     * @return $this
     */
    public function setLang($lang)
    {
        $this->params['lang'] = $lang;
        return $this;
    }

    /**
     * Defines if the Gender needs to be predicted.
     *
     * @return UserProfileData
     */
    public function withGender()
    {
        return $this->addSettings('gender');
    }

    /**
     * Defines if Age Group attribute needs to be predicted.
     *
     * @return UserProfileData
     */
    public function withAgeGroup()
    {
        return $this->addSettings('age_group');
    }

    /**
     * Defines if Education Level attribute needs to be predicted.
     *
     * @return UserProfileData
     */
    public function withEducationLevel()
    {
        return $this->addSettings('education_level');
    }

    /**
     * Defines if Relationship Status attribute needs to be predicted.
     *
     * @return UserProfileData
     */
    public function withRelationship()
    {
        return $this->addSettings('relationship');
    }

    /**
     * Defines if Income Level attribute needs to be predicted.
     *
     * @return UserProfileData
     */
    public function withOccupation()
    {
        return $this->addSettings('occupation');
    }

    /**
     * Defines if Occupation attribute needs to be predicted.
     *
     * @return UserProfileData
     */
    public function withIncome()
    {
        return $this->addSettings('income');
    }

    /**
     * @inheritdoc
     */
    public function buildQueryData()
    {
        $attr = [];
        if (isset($this->params['attr'])) {
            $attr = $this->params['attr'];
            unset($this->params['attr']);
        }

        $query = parent::buildQueryData();

        $parts = array_map(function($item) {
            return 'attr=' . $item;
        }, $attr);
        if (!empty($parts)) {
            $query .= empty($query) ? '?' : '&';
            $query .= implode('&', $parts);
        }

        return $query;
    }

    private function addSettings($name)
    {
        if (!isset($this->params['attr'])) {
            $this->params['attr'] = [];
        }

        $this->params['attr'][] = $name;
        return $this;
    }
}