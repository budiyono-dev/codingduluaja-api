<?php

namespace App\Exceptions;

use App\Constants\ResponseCode;
use App\Helper\ResponseHelper;
use App\Traits\ApiContext;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{
    use ApiContext;

    public function __construct(Container $container, private ResponseHelper $responseHelper)
    {
        parent::__construct($container);
    }

    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {

        $this->renderable(function (TokenException $e, $request) {
            if ($this->isApiRequest($request)) {
                Log::info("token exception = {$e->getMessage()}");
                return $this->responseHelper->unAuthorize($this->getRequestId());
            }
        });

        $this->renderable(function (ApiException $e, $request) {
            if ($this->isApiRequest($request)) {
                Log::info("api exception = {$e->getMessage()}");
                return $this->responseHelper
                    ->error($this->getRequestId(), $e->getErrorCode(), $e->getMessage(), $e->getHttpCode(), null);
            }
        });

        $this->renderable(function (ValidationException $e, $request) {
            if ($this->isApiRequest($request)) {
                Log::info("Validation Exception " . json_encode($e->validator->errors()->all()));
                return $this->responseHelper
                    ->validationError(
                        $this->getRequestId(),
                        ResponseCode::FORM_VALIDATION,
                        $e->validator->errors()->all()
                    );
            }
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            Log::info('not found ');
            if ($this->isApiRequest($request)) {
                $reqId = $this->getRequestId();
                if ($e->getPrevious() instanceof ModelNotFoundException) {
                    return $this->responseHelper->notFound($reqId, 'Data not found', ResponseCode::MODEL_NOT_FOUND);
                } else {
                    return $this->responseHelper->resourceNotFound($reqId);
                }
            }
        });

        $this->renderable(function (Exception $e, $request) {
            if ($this->isApiRequest($request)) {
                $reqId = $this->getRequestId();
                Log::info("error 500 : {$e->getMessage()}, request_id : {$reqId}");
                return $this->responseHelper->serverError($reqId, ['error' => 'System Error']);
            }
        });
    }

    private function isApiRequest($request): bool
    {
        $enableApiDebug = config('cda.enable_api_debug_response');
        if ($enableApiDebug) {
            return false;
        }
        return $request->is('api/*');
    }
}
