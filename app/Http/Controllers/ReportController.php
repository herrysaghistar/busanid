<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SampleReportExport;

class ReportController extends Controller
{
    public function generate()
    {
        return view('generate.index');
    }

    public function generateReport(Request $request)
    {
        // Create a Carbon instance from the input value
        $carbonDate = Carbon::createFromFormat('Y-m', $request->tgl);

        // Extract month and year
        $selectedMonth = $carbonDate->format('m');
        $selectedYear = $carbonDate->year;

        $month = $selectedMonth;
        $year = $selectedYear;
        $lastDayOfMonth = Carbon::create($year, $month, 1)->lastOfMonth();

        return Excel::download(new SampleReportExport($month, $year, $lastDayOfMonth),  'Report sales 1 '.$month.' '.$year.' - '.$lastDayOfMonth->format('d m Y').'.xlsx');
    }
}
