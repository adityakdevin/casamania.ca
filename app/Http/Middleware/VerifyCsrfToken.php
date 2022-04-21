<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
  protected $except = [
    '/sociallogin/google',
    '/sociallogin/facebook',
    '/sociallogin/github',
    '/sociallogin/twitter',
    '/sociallogin/vkontakte',
    '/facebook-leadgen-integration-webhook'
  ];
}
