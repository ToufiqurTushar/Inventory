<?php

namespace App\Http\Controllers;

use App\Models\FoodOrder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $dailyReports = FoodOrder::whereNotNull('payment_status')->whereDate('created_at', date('Y-m-d'))->get();
        return view('app.report.index', compact('dailyReports'));
    }
}
