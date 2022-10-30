<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    protected int $statusCode = Response::HTTP_OK;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): ApiController
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respond(array $data, array $headers = []): JsonResponse
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithSuccess(array $message): JsonResponse
    {
        return $this->respond($message);
    }

    public function respondWithError(string $message): JsonResponse
    {
        return $this->respond([
            'errors' => [
                'status' => $this->getStatusCode(),
                'errors' => $message
            ]
        ]);
    }

    public function respondForbidden(string $message = 'Access forbidden'): JsonResponse
    {
        $this->setStatusCode(Response::HTTP_FORBIDDEN);
        $completeMessage = $message;
        $completeMessage .= "\nstatus_code: " . $this->statusCode;
        if (isset($_SERVER['REQUEST_URI'])) {
            $completeMessage .= "\nrequest_url: " . parse_url($_SERVER['REQUEST_URI'])['path'];
        }

        return $this->respondWithError($completeMessage);
    }

    public function respondUnauthorized(string $message = 'The requested resource failed authorization'): JsonResponse
    {
        $this->setStatusCode(Response::HTTP_UNAUTHORIZED);
        $completeMessage = $message;
        $completeMessage .= "\nstatus_code: " . $this->statusCode;
        if (isset($_SERVER['REQUEST_URI'])) {
            $completeMessage .= "\nrequest_url: " . parse_url($_SERVER['REQUEST_URI'])['path'];
        }
        return $this->respondWithError($completeMessage);
    }

    public function respondNotFound(string $message = 'The requested resource could not be found'): JsonResponse
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondInternalError(string $message = 'An internal server error has occurred'): JsonResponse
    {
        $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        $completeMessage = $message;
        $completeMessage .= "\nstatus_code: " . $this->statusCode;
        if (isset($_SERVER['REQUEST_URI'])) {
            $completeMessage .= "\nrequest_url: " . parse_url($_SERVER['REQUEST_URI'])['path'];
        }
        return $this->respondWithError($completeMessage);
    }

    public function respondConfigInternalError(string $message): JsonResponse
    {
        $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        $completeMessage = $message;
        $completeMessage .= "\nstatus_code: " . $this->statusCode;
        if (isset($_SERVER['REQUEST_URI'])) {
            $completeMessage .= "\nrequest_url: " . parse_url($_SERVER['REQUEST_URI'])['path'];
        }
        return $this->respondWithError($completeMessage);
    }

    public function respondUnprocessableEntity(string $message = 'The request cannot be processed'): JsonResponse
    {
        $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        $completeMessage = $message;
        $completeMessage .= "\nstatus_code: " . $this->statusCode;
        if (isset($_SERVER['REQUEST_URI'])) {
            $completeMessage .= "\nrequest_url: " . parse_url($_SERVER['REQUEST_URI'])['path'];
        }
        return $this->respondWithError($completeMessage);
    }

    public function respondCreated(array $resource = []): JsonResponse
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->respondWithSuccess($resource);
    }

    public function respondUpdated(array $resource = []): JsonResponse
    {
        return $this->setStatusCode(Response::HTTP_OK)->respondWithSuccess($resource);
    }

    public function respondNoContent(): JsonResponse
    {
        return $this->setStatusCode(Response::HTTP_NO_CONTENT)->respond();
    }

    public function respondHttpConflict(string $message): JsonResponse
    {
        return $this->setStatusCode(Response::HTTP_CONFLICT)->respondWithError($message);
    }
}
