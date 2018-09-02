<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Repositories\CategoryRepository;
use App\Repositories\RaceRepository;
use App\Repositories\UserRepository;

class RaceController extends Controller
{
    /**
     * @var RaceRepository
     */
    private $raceRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * RaceController constructor.
     * @param RaceRepository $raceRepository
     * @param CategoryRepository $categoryRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        RaceRepository $raceRepository,
        CategoryRepository $categoryRepository,
        UserRepository $userRepository
    ) {
        $this->raceRepository = $raceRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Get all races ..
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.race.index', [
            'races' => $this->raceRepository->getRaces()
        ]);
    }

    /**
     * Show a specific race
     *
     * @param $raceId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($raceId)
    {
        return view('web.race.show', [
            'race' => $this->raceRepository->getRace($raceId),
            'categories' => $this->categoryRepository->getCategories(),
        ]);
    }

    /**
     * Get the users for this race category
     *
     * @param $raceId
     * @param $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategoryUsers($raceId, $categoryId)
    {
        $races = Race::leftJoin('user_races', 'races.id', '=', 'user_races.race_id')
            ->leftJoin('users', 'user_races.user_id', '=', 'users.id')
            ->leftJoin('user_categories', 'users.id', '=', 'user_categories.user_id')
            ->leftJoin('categories', 'user_categories.category_id', '=', 'categories.id')
            ->where('categories.id', $categoryId)
            ->where('races.id', $raceId)
            ->select(['user_races.*', 'users.*'])
//            ->groupBy(['item_categories.id'])
            ->get();

//        dd($races[0]);

        return view('web.race.category', [
            'raceUsers' => $races
        ]);

    }

    /**
     * Show a specific race user
     *
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRaceUser($userId)
    {
        return view('web.race.show', [
            'race' => $this->userRepository->getUser($userId)
        ]);
    }
}
