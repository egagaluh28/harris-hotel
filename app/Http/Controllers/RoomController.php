<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class RoomController extends Controller
{
    public function index()
    {
        $kamars = Kamar::limit(3)->get();
        return view('index', compact('kamars'));
    }

    public function map()
    {
        return view ('');
    }
}