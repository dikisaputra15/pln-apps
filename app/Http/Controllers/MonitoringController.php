<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        return view('pages.monitoring.index');
    }

    public function rkm()
    {
        return view('pages.monitoring.rkm');
    }

    public function allperformance()
    {
        return view('pages.monitoring.allperformance');
    }
}
