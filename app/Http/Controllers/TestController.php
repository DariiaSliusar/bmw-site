<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($name, $lname = null)
    {
//        $data = $request->all();
//        dd($name, $lname);
//        dd($data['name']);
//        dd($request->input('name'));
//        dd($request->get('name'));
//        dd($request->has('name'));

        return view('test.names', compact('name', 'lname'));
    }



}
