<?php
// SampleReportExport
namespace App\Exports;

use Auth;
use App\Models\User;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class SampleReportExport implements FromCollection, WithHeadings, WithEvents
{
    public function __construct($month, $year, $lastDayOfMonth)
    {
        $this->month = $month;
        $this->year = $year;
        $this->lastDayOfMonth = $lastDayOfMonth;
    }

    public function collection()
    {
        // Filter users based on the month and year
        $query = User::select(
            'users.name as user_name',
            DB::raw('COUNT(sales.id) as total_sales'),
            DB::raw('SUM(CASE WHEN sales.jenis = "barang" THEN 1 ELSE 0 END) as total_barang_sales'),
            DB::raw('SUM(CASE WHEN sales.jenis = "jasa" THEN 1 ELSE 0 END) as total_jasa_sales'),
            DB::raw('SUM(CASE WHEN sales.jenis = "barang" THEN sales.nominal ELSE 0 END) as total_nominal_barang'),
            DB::raw('SUM(CASE WHEN sales.jenis = "jasa" THEN sales.nominal ELSE 0 END) as total_nominal_jasa')
        )
        ->leftJoin('sales', 'users.id', '=', 'sales.user_id')
        ->whereMonth('sales.tgl', $this->month)
        ->whereYear('sales.tgl', $this->year)
        ->groupBy('users.id', 'users.name')
        ->get();

        return $query;
    }

    public function headings(): array
    {
        return [
            'User',
            'Jumlah Hari Kerja',
            'Jumlah Transaksi Barang',
            'Jumlah Transaksi Jasa',
            'Nominal Transaksi Barang',
            'Nominal Transaksi jasa',
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet;

                $loggedInUser = Auth::user();

                $sheet->setCellValue('A1', 'Requestor : ' . $loggedInUser->name.'('.$loggedInUser->email.')');
                $sheet->setCellValue('A3', 'Parameter');
                $sheet->setCellValue('A4', 'Start Date '.'1 '.$this->month.' '.$this->year);
                $sheet->setCellValue('A5', 'End Date '.$this->lastDayOfMonth->format('d m Y'));
                $sheet->setCellValue('A6', '');
            },
        ];
    }
}
