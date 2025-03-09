<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BeforeMiddleware;
use App\Http\Middleware\AfterMiddleware;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class DemoController extends BaseController
{
    public function __construct()
    {
        $this->middleware(BeforeMiddleware::class);
        $this->middleware(AfterMiddleware::class, ['only' => ['show', 'edit']]);
        $this->middleware('after', ['except' => ['store']]);
    }
    
    public function index()
{
    return response()->json([
        'message' => 'DemoController index method',
        'status' => 'success'
    ]);
}

public function show($id)
{
    return response()->json([
        'message' => 'Showing item: ' . $id,
        'status' => 'success'
    ]);
}

public function store(Request $request)
{
    return response()->json([
        'message' => 'Data stored successfully',
        'data' => $request->all()
    ]);
}
}