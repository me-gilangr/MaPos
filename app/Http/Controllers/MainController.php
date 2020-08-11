<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		return view('welcome');
	}

	public function main()
	{
		$this->middleware('role:admin');
		return view('main');
	}
}
