<?php

namespace App\Exports\Sheets;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersPerMonthSheet implements FromQuery
{
    use Exportable;
    private $year;
    private $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function query()
    {
        return User::query()
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
    }
}
