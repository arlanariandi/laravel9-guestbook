<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // date now
        $dateNow = Carbon::now()->format('Y-m-d');
        // last month
        $lastMonth = Carbon::now()->subMonth()->format('m');

        // list and count date now
        $listToday = Guest::whereDate('created_at', $dateNow)->get();
        $countToday = $listToday->count();

        // list and count last month
        $listLastMonth = Guest::whereMonth('created_at', $lastMonth)->get();
        $countLastMonth = $listLastMonth->count();

        // all guest
        $countAll = Guest::count();

        return view('dashboard', compact('countToday', 'countLastMonth', 'countAll'));
    }
}
