<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cctv;
use App\Models\Building;
use App\Models\User;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportController extends Controller
{
    public function exportStats()
    {
        $data = [
            ['Metric', 'Value'],
            ['Users Online (placeholder)', 0],
            ['Users Offline (placeholder)', 0],
            ['Total Buildings', Building::count()],
            ['Total CCTV', Cctv::count()],
            ['CCTV Online', Cctv::where('status','online')->count()],
            ['CCTV Offline', Cctv::where('status','offline')->count()],
            ['CCTV Maintenance', Cctv::where('status','maintenance')->count()],
            ['Exported At', now()->toDateTimeString()],
        ];

        $export = new class($data) implements FromArray, WithTitle {
            public function __construct(private array $data) {}
            public function array(): array { return $this->data; }
            public function title(): string { return 'Stats'; }
        };

        return Excel::download($export, 'admin-stats.xlsx');
    }
}

