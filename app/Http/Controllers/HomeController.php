<?php

namespace App\Http\Controllers;



use App\Models\CheckUrl;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        return view('home');
    }

    public function addUrl(Request $request){
        $request->validate([
            'url' => 'required|url',
            'frequence' => 'required|integer',
            'quantity' => 'required|integer|min:0|max:10',
        ]);
        CheckUrl::create($request->all());
        return redirect()->back();
    }
}
