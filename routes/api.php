<?php

use App\Http\Controllers\LogicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;



Route::apiResource('clientes', ClienteController::class);