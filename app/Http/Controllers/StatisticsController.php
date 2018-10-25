<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class StatisticsController extends Controller
{
    public function index_statistics(){
        return view('admin.statistics.index_statistics');
    }
    public function view_day(){
        return view('admin.statistics.load_pages.calendar');
    }
}