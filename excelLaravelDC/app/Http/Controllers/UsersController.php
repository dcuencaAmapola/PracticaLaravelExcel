<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

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
        return Excel::download(new UsersExport, 'users.pdf');
    }
}
