<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Exports\UsersExportQuery;
use App\Exports\UsersExportView;
use App\Exports\UsersExportMultiple;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id','DESC')->get();
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

    public function exportMultipleSheets(Request $request)
    {
        $year = $request->get('year');
        return (new UsersExportMultiple)->forYear($year)->download('users.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport,'users3.xlsx');
        return redirect()->route('users.index')->with('sucess', 'All good!');
    }
}
