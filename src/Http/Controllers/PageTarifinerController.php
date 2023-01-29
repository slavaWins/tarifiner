<?php

namespace Tarifiner\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageTarifinerController extends Controller
{


    public function index()
    {
        return view('tarifiner::page');
    }
}
