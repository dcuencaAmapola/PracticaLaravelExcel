<?php

use Illuminate\Support\Facades\Route;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/', function (UsersExport $usersExport) {
    //$pdf = App::make('dompdf.wrapper');//resuelve el wrapper, resuelve dependencias y devuelve listo, inicializa el paquete
    //$pdf->loadHTML('<h1>Test</h1>');//cargara un archivo html para formato
    //$pdf = PDF::loadHTML('<h1>Test</h1>');
    return view('welcome');


    //Excel varias formas de poder exportar
    /*$usersExport = new UsersExport;
    return $usersExport->download('users.xlsx');*/

    //return Excel::download(new UsersExport(2019), 'users.csv');
    //return (new UsersExport)->download('users.xlsx');
    //return $usersExport->store('users.csv','public');
});
Route::get('/users','App\Http\Controllers\UsersController@index')->name('users.index');
Route::get('/users/export/', 'App\Http\Controllers\UsersController@export')->name('user.export');


Route::get('download',function(){
    $pdf = Pdf::loadView('welcome');
    //return $pdf->stream();//muestra el pdf en el navegador
    $pdf->setPaper('a4','landscape');//cambia la orientacion de la hoja pdf
    return $pdf->download();//muestra para descargar automaticamente
})->name('downloadPDF');


