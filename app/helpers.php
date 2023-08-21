<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('Username')) {
    function Username()
    {
        return Auth::user()->username;
    }
}

if (! function_exists('unreadNotifications')) {
    function unreadNotifications()
    {
        return Auth::User()->unreadNotifications;
    }
}

