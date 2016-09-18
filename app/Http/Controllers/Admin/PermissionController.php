<?php

namespace App\Http\Controllers\Admin;

use PermissionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.list');
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy($id)
    {

    }

    public function ajaxIndex()
    {
        $data = PermissionRepository::ajaxIndex();
        return response()->json($data);
    }
}
