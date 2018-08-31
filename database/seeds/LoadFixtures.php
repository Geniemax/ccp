<?php

use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\RaceRepository;

class LoadFixtures extends \Illuminate\Database\Seeder
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var RaceRepository
     */
    private $raceRepository;

    /**
     * LoadFixtures constructor.
     * @param UserRepository $userRepository
     * @param CategoryRepository $categoryRepository
     * @param RaceRepository $raceRepository
     */
    public function __construct(
        UserRepository $userRepository,
        CategoryRepository $categoryRepository,
        RaceRepository $raceRepository
    ) {

        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->raceRepository = $raceRepository;
    }

    public function run()
    {
        $users = $this->createUsers();
        $categories = $this->createCategories();
        $races = $this->createRaces();
    }

    /**
     * Create 2 test accounts (admin and runner)
     * Create additional random users
     */
    private function createUsers()
    {
        $this->createUser('admin', 'admin@cc.com', 'admin123');
        $this->createUser('runner', 'runner@cc.com', 'runner123');

        // create random users (with random name, email and password)
        for ($i=0;$i <= 20;$i++) {
            $this->createUser(
                str_random(rand(6,12)),
                str_random(4).'@'.str_random(6).'.com',
                str_random(10)
            );
        }
        return $this->userRepository->getUsers();
    }

    /**
     * Create a user with the provided information
     *
     * @param $name
     * @param $email
     * @param $password
     */
    private function createUser($name, $email, $password)
    {
        $this->userRepository->createUser([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }
}