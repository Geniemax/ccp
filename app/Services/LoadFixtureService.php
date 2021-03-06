<?php

namespace App\Services;

class LoadFixtureService
{
    protected $suffix = 'cc.com';

    /**
     * Get a random name
     *
     * @param int $limit
     * @return string
     */
    public function getRandomName($limit = 16)
    {
        return str_random($limit);
    }

    /**
     * Get a random email with private domain extension
     *
     * @param int $limit
     * @return string
     */
    public function getRandomEmail($limit = 12)
    {
        return str_random($limit).'@'. $this->suffix;
    }

    /**
     * get random range of text
     * @return string
     */
    public function getRandomText()
    {
        return str_random(16).str_random(16).str_random(16).str_random(16).str_random(16);
    }
}
