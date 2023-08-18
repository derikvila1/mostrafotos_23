<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\PermissionController;

class ApplicationController extends Controller
{
    public function test(Request $request){
        return PermissionController::grantPermissionToUser($request->permission, $request->user);
    }
}
