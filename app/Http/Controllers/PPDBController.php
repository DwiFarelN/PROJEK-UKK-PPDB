<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPDBController extends Controller
{
    public function index()
    {
        return view('ppdb.welcome');
    }
    
    public function jurusan()
    {
        return view('ppdb.jurusan');
    }
    
    public function persyaratan()
    {
        return view('ppdb.persyaratan');
    }
    
    public function caraDaftar()
    {
        return view('ppdb.cara-daftar');
    }
    
    public function faq()
    {
        return view('ppdb.faq');
    }
    
    public function login()
    {
        return view('auth.login');
    }
    
    public function daftar()
    {
        return view('auth.daftar');
    }
}