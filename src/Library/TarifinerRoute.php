<?php


namespace Tarifiner\Library;


use Illuminate\Support\Facades\Route;

class TarifinerRoute
{

    public static function routes()
    {
        Route::get('/example/tarifiner', [\Tarifiner\Http\Controllers\PageTarifinerController::class, 'index']);
    }

}
