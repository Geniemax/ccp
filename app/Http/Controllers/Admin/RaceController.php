<?php


namespace App\Http\Controllers\Admin;


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

    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store()
    {

    }
}