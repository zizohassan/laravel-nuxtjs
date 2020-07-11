<?php
namespace App\Http\Controllers;

trait ResponseTrait
{

    protected function errorResponse($e)
    {
        return $this->res([], false, $e);
    }

    protected function successWithData($data)
    {
        return $this->res($data, true, 'here what we found in ' . $this->module_name);
    }

    protected function youCantAccess()
    {
        return $this->res([], false, 'you can not access this module');
    }

    protected function res($data = [], $status = true, $message = '')
    {
        $data = [
            'payload' => $data,
            'status' => $status,
            'message' => $message
        ];
        return response()->json($data);
    }

}
