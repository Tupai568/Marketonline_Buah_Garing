<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $data = [
            "Title" => "accounts",
            "Categories" => Category::all()
        ];
        return view("accounts", $data);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "name" => "required|min:5|max:60",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "category_id" => "required|numeric",
            "image_url" => "file|image|max:1024"
        ]);

        $validatedData['price'] = number_format(preg_replace('/\D/', '', $request->input('price')), 0, ',', '.');
        $destinationPath = public_path('img');
        $file = $request->file("image_url");
        $fileName = 'product' . Str::uuid() . '.' . $file->getClientOriginalExtension();
        $filePath = $destinationPath . '/' . $fileName;
        $file->move($destinationPath, $fileName);

        Product::create($validatedData);
    }

    /* update profile */
    public function updateProfile(Request $request)
    {
        $validate = $request->validate([
            "id" => "required|integer|exists:users,id",
            "name" => "required|string|min:5|max:5"
        ]);

        $user = User::findOrFail($validate["id"]);
        $user->update($validate);

        return redirect()->route('accounts')->with('success', 'User updated successfully.');
    }
}
