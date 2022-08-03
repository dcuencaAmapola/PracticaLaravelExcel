<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class UsersExportView implements FromView
{
    use Exportable;
    public function view(): View
    {
        return view('exports.usersView',[
            'users' => User::get()
        ]);
    }

}
