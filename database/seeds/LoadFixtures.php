<?php

use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\RaceRepository;
use App\Services\LoadFixtureService;

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
     * @var LoadFixtureService
     */
    private $loadFixtureService;

    /**
     * LoadFixtures constructor.
     * @param UserRepository $userRepository
     * @param CategoryRepository $categoryRepository
     * @param RaceRepository $raceRepository
     * @param LoadFixtureService $loadFixtureService
     */
    public function __construct(
        UserRepository $userRepository,
        CategoryRepository $categoryRepository,
        RaceRepository $raceRepository,
        LoadFixtureService $loadFixtureService
    ) {

        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->raceRepository = $raceRepository;
        $this->loadFixtureService = $loadFixtureService;
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
    private function createCategories()
    {
        $categories = [
            'Under 18\'s',
            '18-30',
            '31-45',
            '46-60',
            'seniors',
        ];

        foreach($categories as $category) {
            $this->createCategory($category, true);
        }

        return $this->categoryRepository->getCategories();
    }

    /**
     * Create a new category
     *
     * @param $category
     * @param $status
     * @return mixed
     */
    private function createCategory($category, $status)
    {
        return $this->categoryRepository->createCategory([
            'name' => $category,
            'status' => $status
        ]);
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
                $this->loadFixtureService->getRandomName(rand(6,12)),
                $this->loadFixtureService->getRandomEmail(rand(4, 8)),
                $this->loadFixtureService->getRandomName(8)
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
            'password' => $password,
            'status' => true
        ]);
    }

    /**
     * Create 2 test accounts (admin and runner)
     * Create additional random users
     */
    private function createRaces()
    {
        $categories = [
            'foot race finale',
            'qualifier',
            'warm up'
        ];

        foreach($categories as $category) {
            $this->createRace($category, true);
        }

        return $this->categoryRepository->getCategories();
    }

    /**
     * Create a new category
     *
     * @param $race
     * @param $status
     * @return mixed
     */
    private function createRace($race, $status)
    {
        return $this->raceRepository->createRace([
            'name' => $race,
            'status' => $status
        ]);
    }
}