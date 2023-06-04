<?php

namespace App\Http\Controllers;

use App\Bid;
use App\BidRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {

        return view('frontend.index');
    }

}
