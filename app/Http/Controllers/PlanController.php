<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PlanController extends Controller
{
    public function index()
    {
        $plans=Plan::all();
        return View::make('plans',compact('plans'));
    }
}
