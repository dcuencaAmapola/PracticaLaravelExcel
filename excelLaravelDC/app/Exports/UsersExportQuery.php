<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExportQuery implements FromQuery
{
    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function query()
    {
        return User::query();
    }
}
