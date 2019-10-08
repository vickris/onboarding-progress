<?php

namespace App\Http\Controllers;

use App\Services\OnboardingProgressService;
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
        return view('welcome', ['cohorts' => json_encode(OnboardingProgressService::directToAppropriateService(storage_path('export.csv')))]);
    }
}
