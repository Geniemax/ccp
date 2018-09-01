<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\RaceRepository;

class RaceController extends Controller
{
    /**
     * @var RaceRepository
     */
    private $raceRepository;

    /**
     * RaceController constructor.
     * @param RaceRepository $raceRepository
     */
    public function __construct(RaceRepository $raceRepository)
    {
        $this->raceRepository = $raceRepository;
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
        ]);
    }
}
