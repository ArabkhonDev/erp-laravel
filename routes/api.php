<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/salom", function (Request $request) {
    return response()->json([
        'salom'=> "salom"
    ]);
});
