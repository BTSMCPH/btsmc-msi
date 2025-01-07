<?php

namespace App\Http\Controllers\Guest;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceContractingController extends Controller
{
    public function index(): View
    {
        return view('pages.services-contracting');
    }
}
