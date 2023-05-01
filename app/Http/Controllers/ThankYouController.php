<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThankYouController extends Controller
{
    public function thankyou()
	{
		return view('scholarship_applications.thankyou');
	}
}
