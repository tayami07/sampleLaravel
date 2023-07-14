<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;

class FormController extends Controller
{
    // public function index()
    // {
        // return view('form.form');
        public function index()
    {
        return view('form.form');

        $children = Child::all();

        return view('form', compact('children'));
    }
    // }
}
