<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        return Inertia::render('Welcome');
    }
    public function services()
    {
        return Inertia::render('Services');
    }
}
