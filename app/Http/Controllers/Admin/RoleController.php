<?php

namespace App\Http\Controllers\Admin;

use RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.list');
    }

    public function ajaxIndex()
    {
        $data = RoleRepository::ajaxIndex();
        return response()->json($data);
    }
}
