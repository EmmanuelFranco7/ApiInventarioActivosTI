<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{

    protected $addHttpCookie = true;

    protected $except = [
        'http://localhost:1414/v1/dependencias',
        'auth/google/callback',
    ];
}
