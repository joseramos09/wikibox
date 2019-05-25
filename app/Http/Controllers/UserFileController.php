<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFileController extends Controller
{
    public function index($userSlug)
    {
        $user = User::where('slug', $userSlug)->firstOrFail();
        $files = $user->files()->paginate(10);
        return view('public.userfiles.index',[
            'user'  => $user,
            'files' => $files
        ]);
    }
}
