<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('getUser')) {
    function getUser()
    {
        $user = Auth::user();
        return $user;
    }
}
