<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hello extends Controller
{
    function index() {
        return 'Hello World from Hello Controller';
    }

    function greet() {
        return view('greet');
    }

    function post_greet(Request $request) {
        $nama = $request->input('nama') ?? "World";
        return "Hello $nama";
    }
}
