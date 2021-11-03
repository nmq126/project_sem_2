<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function getForm()
    {
        return view('admin.products.form');
    }

    public function getList()
    {
        return view('admin.products.list');
    }
}
