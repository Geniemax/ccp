<?php

namespace App\Repositories;

use App\Models\Race;

class RaceRepository
{
    /**
     * @var Race
     */
    private $race;

    /**
     * RaceRepository constructor.
     * @param Race $race
     */
    public function __construct(Race $race)
    {
        $this->race = $race;
    }

    /**
     * Get all the available race
     * @param null $status
     * @return Race[]
     */
    public function getRaces($status = null)
    {
        $query = $this->race;

        if (!is_null($status)) {
            $query = $query->where('status', (bool) $status);
        }

        return $query->get();
    }

    /**
     * Get a race by $raceId
     * @param $raceId
     * @return Race
     */
    public function getRace($raceId)
    {
        return $this->race->where('id', $raceId)->first();
    }

    /**
     * Create a new race
     *
     * @param array $data
     * @return mixed
     */
    public function createRace(array $data)
    {
        return $this->race->create($this->getModelDataFromRequest($data));
    }

    /**
     * Update Race
     *
     * @param $raceId
     * @param array $data
     * @return mixed
     */
    public function updateRace($raceId, array $data)
    {
        return $this->race->where('id', $raceId)->update($this->getModelDataFromRequest($data));
    }

    /**
     * Get the model data from the request
     *
     * @param array $data
     * @return array
     */
    private function getModelDataFromRequest(array $data)
    {
        $newData = [];

        if (array_key_exists('name', $data) && !empty($data['name'])) {
            $newData['name'] = $data['name'];
            $newData['slug'] = str_slug($data['name']);
        }

        // override slug if required
        if (array_key_exists('slug', $data) && !empty($data['slug'])) {
            $newData['slug'] = str_slug($data['slug']);
        }

        if (array_key_exists('description', $data) && !empty($data['description'])) {
            $newData['description'] = str_slug($data['description']);
        }

        $newData['status'] = isset($data['status']) && (int) $data['status'] > 0 ? 1 : 0;

        return $newData;
    }
}
