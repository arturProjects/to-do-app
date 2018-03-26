<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Task\Repository\TaskRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = TaskRepository::index();
        return view('home', compact('tasks'));
    }
}
