<?php


namespace SoMin\Entities;

class OSNUserData
{
    /** @var array */
    private $rawData;

    /** @var Account[] */
    private $accounts;
    /** @var Post[] */
    private $posts;
    /** @var array */
    private $attributes;

    /**
     * OSNUserData constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->rawData = $data;

        $this->parseAccounts();
        $this->parsePosts();
        $this->parseAttributes();
    }

    private function parseAccounts()
    {
        if (!isset($this->rawData['ids'])) {
            return;
        }

        foreach ($this->rawData['ids'] as $accountType => $accountData) {
            if (is_array($accountData)) {
                $this->accounts[$accountType] = new Account($accountData);
            }
        }
    }

    private function parsePosts()
    {
        if (!isset($this->rawData['posts'])) {
            return;
        }

        foreach ($this->rawData['posts'] as $postData) {
            $this->posts[] = new Post($postData);
        }
    }

    private function parseAttributes()
    {
        if (!isset($this->rawData['attributes'])) {
            return;
        }

        $this->attributes = $this->rawData['attributes'];
    }

    /**
     * @return Account[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @return array
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * @return Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}