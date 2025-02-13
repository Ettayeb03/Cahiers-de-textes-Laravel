<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Affiche la page d'administration principale.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin'); 
    }
}
