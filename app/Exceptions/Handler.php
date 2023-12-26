<?php

namespace App\Exceptions;


use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }
    public function invalidJson($request, ValidationException $exception)
    {
        if (Request::wantsJson()){
            $v = $exception->errors();
            foreach ($v as $key => $value) {
                return api_response(0, $value[0], '');
            }
        }
    }


    public function render($request, Throwable $e)
    {
        if($this->isHttpException($e))
        {
//            switch (intval($e->getStatusCode())) {
//                // not found or  internal error
//                case 500:
//                case 404:
//                    return redirect()->route('home');
//                    break;
//                default:
//                    return $this->renderHttpException($e);
//                    break;
//            }
        }

        return parent::render($request, $e);
    }
}
