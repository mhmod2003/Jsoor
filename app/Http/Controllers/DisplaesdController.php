<?php

namespace App\Http\Controllers;

use App\Models\Displaesd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DisplaesdController extends Controller
{
    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'home_type' => 'required',
        'address' => 'required',
        'family_book_image' => 'required|image',
        'family_members_count' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $imageName = time() . '.' . $request->family_book_image->extension();
    $request->family_book_image->move(public_path('images'), $imageName);

    $displaesd = Displaesd::create([
        'user_id' => auth()->id(),
        'home_type' => $request->home_type,
        'address' => $request->address,
        'family_book_image' => $imageName,
        'family_members_count' => $request->family_members_count,
    ]);

    return response()->json(['message' => 'Displaesd data saved successfully'], 201);
    }
}
