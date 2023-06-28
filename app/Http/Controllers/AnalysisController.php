<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class AnalysisController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->year;

        $sales = Sale::selectRaw('year(created_at) as year, max(price * amount) as max_amount')
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

        $yearArray = $sales->pluck('year')->toArray();
        $salesArray = $sales->pluck('max_amount')->toArray();
        
        return view('analysis', 
        compact('year', 'yearArray', 'salesArray'));
    }
}
