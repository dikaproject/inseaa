<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Analytics\AnalyticsClientFactory;
use Spatie\Analytics\Period;
use Spatie\Analytics\Facades\Analytics;

class AdminController extends Controller
{
    // protected $analytics;

    // public function __construct(Analytics $analytics)
    // {
    //     $this->analytics = $analytics;
    // }

    public function dashboard(Request $request)
{
    // Determine the period based on the request or default to 'week'
    $periodType = $request->get('period', 'week');
    $periodMapping = [
        'day' => Period::days(1),
        'week' => Period::days(7),
        'month' => Period::months(1),
        'quarter' => Period::months(3),
        'year' => Period::years(1),
    ];

    $selectedPeriod = $periodMapping[$periodType] ?? Period::days(7);

    // Fetch total visitors and page views
    $trafficData = Analytics::fetchTotalVisitorsAndPageViews($selectedPeriod);

    // Fetch total visitors and page views for the selected period
    $totalTraffic = $trafficData;

    // Fetch most visited pages
    $popularPages = Analytics::fetchMostVisitedPages($selectedPeriod, 10);

    // Map trafficData to use the correct keys
    $trafficData = $trafficData->map(function ($item) {
        return [
            'date' => $item['date']->format('Y-m-d'),
            'pageViews' => $item['screenPageViews'], // Correct key
            'visitors' => $item['activeUsers'], // Correct key
        ];
    });

    return view('admin.dashboard', [
        'trafficData' => $trafficData,
        'totalTraffic' => $totalTraffic,
        'popularPages' => $popularPages,
        'period' => $periodType,
    ]);
}

    public function login()
    {
        return view('admin.login');
    }
    public function login_submit(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('Success', 'Login Successfully.');
        } else {
            return redirect()->route('admin_login')->with('Error', 'Invalid Credentials.');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('Success', 'Logout Successfully.');
    }
}
