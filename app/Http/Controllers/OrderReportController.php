<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    public function index()
    {

        return view('report.order');
    }
}
