<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });


        $this->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Unauthenticated',
                    'status'=>401
                ], 401);
            }
        });

        $this->renderable(function (\Illuminate\Validation\ValidationException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $e->errors(),
                    'status'=>422
                ], 422);
            }
        });

        $this->renderable(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Model not found',
                    'status'=>404
                ], 404);
            }
        });

        $this->renderable(function (\Illuminate\Database\QueryException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Query error',
                    'status'=>500
                ], 500);
            }
        });

        $this->renderable(function (\Illuminate\Auth\Access\AuthorizationException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Unauthorized',
                    'status'=>403
                ], 403);
            }
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Not found',
                    'status'=>404
                ], 404);
            }
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Method not allowed',
                    'status'=>405
                ], 405);
            }
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Http error',
                    'status'=>500
                ], 500);
            }
        });

        $this->renderable(function (\Illuminate\Session\TokenMismatchException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Token mismatch',
                    'status'=>500
                ], 500);
            }
        });

        $this->renderable(function (\Illuminate\Routing\Exceptions\InvalidSignatureException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Invalid signature',
                    'status'=>500
                ], 500);
            }
        });

        $this->renderable(function (\Illuminate\Session\TokenMismatchException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Token mismatch',
                    'status'=>500
                ], 500);
            }
        });
    }
}
