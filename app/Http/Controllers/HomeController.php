<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taosession(Request $request)
    {   echo phpinfo();die;
        session(['key' => 'gia tri session']);
    }

    public function xoasession(Request $request)
    {
        Session::forget('key');
        Session::save();
    }

    public function testsession(Request $request)
    {
        return view('testsession');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->back();
        } else {
            return view('admin/login');
        }

    }

    public function logout()
    {
        Auth::logout();
        return view('admin/login');
    }

    public function postlogin(Request $request)
    {

//        $names = $request->input('User');
        $a = $request->all();
        $name = $request->query('User');
        $User = $request->User;
        $password = $request->password;
        // echo $password;die;
        if (Auth::attempt(['user' => $User, 'password' => $password])) {
            $cate = Category::all();
            return view('admin/category/list', ['cate' => $cate, 'user' => Auth::user()]);
        } else {
            return redirect()->back()->with('thongbao', 'thong tin dang nhap k dung');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postman()
    {
        echo session('key');
        return view('testsession');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
