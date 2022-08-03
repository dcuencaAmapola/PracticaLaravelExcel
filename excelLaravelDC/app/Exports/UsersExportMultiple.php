<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Exports\Sheets\UsersPerMonthSheet;

class UsersExportMultiple implements WithMultipleSheets
{
    use Exportable;
    private $year;

    public function forYear($year)
    {
        $this->year = $year;
        return $this;
    }
    public function sheets(): array
    {
        $sheets = [];
        foreach (range(1, 12) as $month){
            $sheets[] = new UsersPerMonthSheet($this->year, $month);
        }
        return $sheets;
    }

}
