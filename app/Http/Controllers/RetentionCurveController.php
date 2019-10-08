<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CSVReader;

class RetentionCurveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', ['cohorts' => json_encode(CSVReader::read(storage_path('export.csv')))]);
    }
}
