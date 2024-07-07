<?php


namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('dashboard', compact('companies'));
    }
}