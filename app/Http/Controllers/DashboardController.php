<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class DashboardController extends Controller
{

    public function view(){

        return view('dashboard', ['libri' => Libro::all()]);
    }

}
