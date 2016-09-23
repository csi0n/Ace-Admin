<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use UserRepository;

class UserController extends Controller
{
    public function ajaxIndex()
    {
        $data = UserRepository::ajaxIndex();
        return response()->json($data);
    }

    public function index()
    {
        return view('admin.user.list');
    }

    public function store(RoleRequest $request)
    {
    }

    public function update()
    {
    }

    public function create()
    {
    }

    public function edit($id)
    {
        $user = UserRepository::edit($id);
        if ($user)
            return view('admin.user.edit');
        return redirect('admin/user');
    }

}
