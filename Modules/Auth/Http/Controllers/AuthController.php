<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function login()
    {
        return view('auth::login');
    }
}
