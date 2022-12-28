<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // grafik
        $guests = Guest::selectRaw('count(*) as count, month(created_at) as month')
            ->groupBy('month')
            ->get();

        $months = [];
        foreach ($guests as $guest) {
            $months[] = ucfirst(date('F', mktime(0, 0, 0, $guest->month, 1)));
        }
        // dd($months);

        return view('dashboard', compact('countToday', 'countLastMonth', 'countAll', 'guests', 'months'));
    }
}
