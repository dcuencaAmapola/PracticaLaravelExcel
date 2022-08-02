<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;

class UsersExportView implements FromView
{
    public function view(): View
    {
        return view('exports.users',[
            'users' => User::get()
        ]);
    }
    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function query()
    {
        //
    }
}
