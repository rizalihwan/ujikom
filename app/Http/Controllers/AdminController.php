<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'students' => Student::get()
        ]);
    }
}
