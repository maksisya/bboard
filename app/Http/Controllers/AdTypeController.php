<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdTypeResource;
use App\Models\Ad_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use Tymon\JWTAuth\Contracts\Providers\Auth;

class AdTypeController extends Controller
{
    public function index() 
    {
        return new AdTypeResource(Ad_type::all());
    }

    public function show(int $ad_type_id)
    {
        $ad_type = Ad_type::find($ad_type_id);
        if (!$ad_type) {
            return ['failed'];
        }
        return [$ad_type];
    }

}
