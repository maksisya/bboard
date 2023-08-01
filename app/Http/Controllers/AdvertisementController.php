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

    public function show_my() {
        $advertisements = Advertisement::where('user_id', auth()->id())->get();

        return new AdvertisementResource($advertisements);
    }
    
    // добавление нового объявления
    public function store(Request $request)
    {
        $advertisement = Advertisement::create([
            // 'user_id' => $request->input('user_id'),
            // 'category_id' => $request->input('category_id'),
            // 'ad_type_id' => $request->input('ad_type_id'),
            'user_id' => auth()->id(), // для отладки
            'category_id' => $request->input('category_id'),
            'ad_type_id' => $request->input('ad_type_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $request->input('image_path'),
            'price' => $request->input('price')
        ]);

        return new AdvertisementResource($advertisement);
    }

    public function update(Request $request, int $ad_id) 
    {
        $advertisement = Advertisement::find($ad_id);

        if (!$advertisement) {
            return ['Ad does not exist!'];
        }

        if (auth()->id() !== $advertisement->user_id) {
            return ["You dont't have enough permissions!"];
        }
        
        $advertisement->category_id = $request->input('category_id');
        $advertisement->ad_type_id = $request->input('ad_type_id');
        $advertisement->title = $request->input('title');
        $advertisement->content = $request->input('content');
        $advertisement->image_path = $request->input('image_path');
        $advertisement->price = $request->input('price');

        $advertisement->save();

        return ['Ad updated successfully!'];
    }
    
    public function delete(int $ad_id)
    {
        $advertisement = Advertisement::find($ad_id);

        if (!$advertisement) {
            return ['Ad does not exist!'];
        }

        if (auth()->id() !== $advertisement->user_id) {
            return ["You dont't have enough permissions!"];
        }

        $advertisement->delete();
        return ['Ad deleted successfully!'];
    }
}
