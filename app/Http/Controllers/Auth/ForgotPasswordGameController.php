<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Game\GameController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordGameController extends GameController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset GameController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
}
