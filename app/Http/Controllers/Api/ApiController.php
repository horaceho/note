<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class ApiController extends Controller
{
    protected function formatResponse($data = [], $status = 200, $message = 'OK')
    {
        return response()->json($data, $status, [], JSON_UNESCAPED_UNICODE);
    }

    protected function formatResource($resource)
    {
        return $this->formatResponse($resource);
    }
}
