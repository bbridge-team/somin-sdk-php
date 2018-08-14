<?php

namespace SoMin\API\Crawler\Requests;

use SoMin\Common\AbstractRequest;

class CrawlerTimeline extends AbstractRequest
{
    /**
     * Count of retrieval data.
     *
     * @param int $numToRetrieve
     * @return $this
     */
    public function setNumToRetrieve($numToRetrieve)
    {
        $this->params['num-retrieve'] = $numToRetrieve;
        return $this;
    }

    /**
     * Number of records in the return page when paginating.
     *
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize($pageSize)
    {
        $this->params['page-size'] = $pageSize;
        return $this;
    }

    public function setDataSource($dataSource)
    {
        $this->data['data_source'] = $dataSource;
        return $this;
    }

    /**
     * @param string[] $words
     * @return $this
     */
    public function setAllOfTheseWords($words)
    {
        $this->data['query']['all_of_these_words'] = $words;
        return $this;
    }

    /**
     * @param string $phrase
     * @return $this
     */
    public function setExactPhrase($phrase)
    {
        $this->data['query']['exact_phrase'] = $phrase;
        return $this;
    }

    /**
     * @param string[] $words
     * @return $this
     */
    public function setAnyOfTheseWords($words)
    {
        $this->data['query']['any_of_these_words'] = $words;
        return $this;
    }

    /**
     * @param string[] $words
     * @return $this
     */
    public function setNoneOfTheseWords($words)
    {
        $this->data['query']['none_of_these_words'] = $words;
        return $this;
    }

    /**
     * @param string[] $hashTags
     * @return $this
     */
    public function setHashTags($hashTags)
    {
        $this->data['query']['hashtags'] = $hashTags;
        return $this;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setWrittenIn($language)
    {
        $this->data['query']['written_in'] = $language;
        return $this;
    }

    /**
     * @param string[] $accounts
     * @return $this
     */
    public function setFromTheseAccounts($accounts)
    {
        $this->data['query']['from_these_accounts'] = $accounts;
        return $this;
    }

    /**
     * @param string[] $accounts
     * @return $this
     */
    public function setToTheseAccounts($accounts)
    {
        $this->data['query']['to_these_accounts'] = $accounts;
        return $this;
    }

    /**
     * @param string[] $mentions
     * @return $this
     */
    public function setMentions($mentions)
    {
        $this->data['query']['mentions'] = $mentions;
        return $this;
    }

    /**
     * @param string $place
     * @return $this
     */
    public function setNearThisPlace($place)
    {
        $this->data['query']['near_this_place'] = $place;
        return $this;
    }

    /**
     * @param int $within
     * @return $this
     */
    public function setWithin($within)
    {
        $this->data['query']['within'] = $within;
        return $this;
    }

    /**
     * @param int $fromDate
     * @return $this
     */
    public function setFromDate($fromDate)
    {
        $this->data['query']['from_date'] = $fromDate;
        return $this;
    }

    /**
     * @param int $toDate
     * @return $this
     */
    public function setToDate($toDate)
    {
        $this->data['query']['to_date'] = $toDate;
        return $this;
    }
}