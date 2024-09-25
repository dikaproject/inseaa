<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClientFactory;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
    // protected $analytics;

    // public function __construct(Analytics $analytics)
    // {
    //     $this->analytics = $analytics;
    // }

    public function __construct()
    {
        $unreadContacts = Contact::whereNull('read_at')->orderBy('created_at', 'desc')->get();
        view()->share('unreadContacts', $unreadContacts);
    }

    public function dashboard(Request $request)
{
    // $period = $request->get('period', 'week');
    // $periodMapping = [
    //     'day' => Period::days(1),
    //     'week' => Period::days(7),
    //     'month' => Period::months(1),
    //     'quarter' => Period::months(3),
    //     'year' => Period::years(1),
    // ];

    // $trafficPeriod = $periodMapping[$period] ?? Period::days(7);

    // $trafficData = $this->analytics->fetchTotalVisitorsAndPageViews($trafficPeriod);
    // $monthlyTraffic = $this->analytics->fetchTotalVisitorsAndPageViews(Period::months(1));
    // $popularPages = $this->analytics->fetchMostVisitedPages(Period::days(30));

    // // Convert trafficData to JSON format for Chart.js
    // $trafficData = $trafficData->map(function ($item) {
    //     return [
    //         'date' => $item['date']->format('Y-m-d'), // Format tanggal
    //         'pageViews' => $item['screenPageViews'],
    //         'visitors' => $item['activeUsers']
    //     ];
    // });

    return view('admin.dashboard');
    // return view('admin.dashboard', [
    //     'trafficData' => $trafficData,
    //     'monthlyTraffic' => $monthlyTraffic,
    //     'popularPages' => $popularPages,
    //     'period' => $period
    // ]);
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
            return redirect()->route('admin_dashboard')->with('Success', 'Login Successfully.');
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
