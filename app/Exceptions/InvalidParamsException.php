<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class InvalidParamsException extends Exception
{

    protected $code = '400';
    protected $message = 'Invalid Request Parameters';

}
