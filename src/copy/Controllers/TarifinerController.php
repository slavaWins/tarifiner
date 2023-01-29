<?php

    namespace App\Http\Controllers\Tarifiner;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class TarifinerController extends Controller
    {


        public function index() {


            return view('tarifiner.example');

        }
    }
