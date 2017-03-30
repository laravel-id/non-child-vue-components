<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function paginate()
    {
        abort_if(!request()->ajax(), 404, 'Page not found');

        $users = User::orderBy('email', 'ASC')
            ->filter()
            ->paginate(request('limit', 20));

        if (request()->all()) {
            $users->appends(request()->all());
        }

        return response()->json($users);
    }

    public function index()
    {
        return view('user.index');
    }
}
