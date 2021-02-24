<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\FoodToEat;

class FoodToEatController extends Controller
{

    public function getFoodToEatAll()
    {
        $foodtoeat = FoodToEat::all();
        return response([
            'foodtoeat' => $foodtoeat
        ]);
    }
    public function getFoodToEat($id)
    {
        $foodtoeat = FoodToEat::find($id);
        if (is_null($foodtoeat)) {
            return response()->json(['message' => " Not Found"]);
        }
        return response([
            'foodtoeat' => $foodtoeat
        ]);
    }

    public function createFoodToEat(Request $request)
    {
        $foodtoeat = new FoodToEat();
        $foodtoeat->name = $request->input('name');
        $foodtoeat->save();

        return response()->json(['foodstoeat' => $foodtoeat]);
    }
    public function updateFoodToEat(Request $request, $id)
    {
        $foodtoeat = FoodToEat::find($id);
        $foodtoeat->name = $request->input('name');
        $foodtoeat->update();

        if (is_null($foodtoeat)) {
            return response()->json(['message' => "not found"]);
        }
        return response()->json(['foodtoeat' => $foodtoeat]);
    }

    public function delete($id)
    {
        $foodtoeat = FoodToEat::find($id);
        $foodtoeat->delete();

        if (is_null($foodtoeat)) {
            return response()->json(['message' => "transaction not found"]);
        }
        return response()->json(['foodtoeat' => $foodtoeat]);
    }
}
