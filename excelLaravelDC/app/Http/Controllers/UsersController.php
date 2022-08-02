<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Exports\UsersExportQuery;
use App\Exports\UsersExportView;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::get();
        return view('users', compact('users'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.pdf');
    }

    public function exportQuery()
    {
        return(new UsersExportQuery)->forDate('2021-08-03')->download('users.csv');
    }

    public function exportView()
    {
        return (new UsersExportView)->download('users.xlsx');
    }
}
