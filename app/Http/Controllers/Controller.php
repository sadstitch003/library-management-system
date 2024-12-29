<?php

namespace App\Http\Controllers;

use App\Models\Member;

abstract class Controller
{
    function index() {
        $members = Member::all();
        return view('index', ['members' => $members]);
    }
}
