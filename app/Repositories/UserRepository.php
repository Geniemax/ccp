<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all the available users
     * @param null $status
     * @return User[]
     */
    public function getUsers($status = null)
    {
        $query = $this->user;

        if (!is_null($status)) {
            $query = $query->where('status', (bool) $status);
        }

        return $query->get();
    }

    /**
     * Get a user by $userId
     * @param $userId
     * @return User
     */
    public function getUser($userId)
    {
        return $this->user->where('id', $userId)->first();
    }

    /**
     * Create a new user
     *
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->user->create($this->getModelDataFromRequest($data));
    }

    /**
     * Update User
     *
     * @param $userId
     * @param array $data
     * @return mixed
     */
    public function updateUser($userId, array $data)
    {
        return $this->user->where('id', $userId)->update($this->getModelDataFromRequest($data));
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

        if (array_key_exists('slug', $data) && !empty($data['slug'])) {
            $newData['slug'] = str_slug($data['slug']);
        }

        if (array_key_exists('email', $data) && !empty($data['email'])) {
            $newData['email'] = $data['email'];
        }

        if (array_key_exists('password', $data) && !empty($data['password'])) {
            $newData['password'] = bcrypt($data['password']);
        }

        $newData['status'] = isset($data['status']) && (int) $data['status'] > 0 ? 1 : 0;

        return $newData;
    }
}