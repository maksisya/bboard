<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index() 
    {
        return Advertisement::all();
    }

    public function show(int $ad_id)
    {
        $advertisement = Advertisement::find($ad_id);
        if (!$advertisement) {
            return ['failed'];
        }
        return new AdvertisementResource($advertisement);
    }
    
    // добавление нового объявления
    public function store(Request $request)
    {
        $advertisement = Advertisement::create([
            // 'user_id' => $request->input('user_id'),
            // 'category_id' => $request->input('category_id'),
            // 'ad_type_id' => $request->input('ad_type_id'),
            'user_id' => auth()->id(), // для отладки
            'category_id' => 1, // для отладки
            'ad_type_id' => 1, // для отладки
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $request->input('image_path'),
            'price' => $request->input('price')
        ]);

        return $advertisement;
    }
}
