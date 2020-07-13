<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller\Admin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')
    }

    public function index()
    {
        $data = ['name'=> 'Joe'];
        return view('admin.index', compact('data'));
    }
}
