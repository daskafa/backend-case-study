<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\DeveloperTodo;
use App\Services\DeveloperTodoPlanningService;

class IndexController extends Controller
{
    public function index()
    {
        $developerTodos = DeveloperTodo::all();
        $developers = Developer::orderBy('created_at', 'desc')->get(); // todo: Bu sorgular repository içerisine taşınabilir.

        $weeklyPlanning = (new DeveloperTodoPlanningService)->getWeeklyPlanning($developerTodos, $developers);

        return view('index');
    }
}
