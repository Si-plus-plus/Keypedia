<?php

namespace App\Http\Controllers;

use App\Models\KeyboardCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('home', [
            'categories' => KeyboardCategory::all(),
        ]);
    }
}
