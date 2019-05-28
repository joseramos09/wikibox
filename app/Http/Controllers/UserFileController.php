<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFileController extends Controller
{
    public function index($userSlug)
    {
        $user = User::where('slug', $userSlug)->firstOrFail();
        $file = $user->files()->paginate(15);
        return view('public.userfiles.index',[
            'user'  => $user,
            'file' => $file
        ]);
    }
}
