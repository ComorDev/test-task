<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckUrl;

class AdminController extends Controller
{

    public function index()
    {
        $all = CheckUrl::all();
        return view('admin/view', [
            'all' => $all
        ]);
    }
}
