<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class TicketsController extends Controller
{
    //

    // TicketsController.php file



    public function create()
    {
        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }
}
