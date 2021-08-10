<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        $guard = Arr::get($exception->guards(), 0);

//        if(Auth::guard($guard)->check()){ 
  //          return redirect()->route("{$guard}.login");
   //     }
      
        switch($guard){
            case 'aluno':
                $login = 'aluno.login.form';
            break;
            case 'administrador':
                $login = 'administrador.login.form';
            break;
        }
        return redirect()->guest(route($login));
    }
}
