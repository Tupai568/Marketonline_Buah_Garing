<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            "image_url" => "file|image|max:1024",
            "description" => "string"
        ]);

        $destinationPath = public_path('img');
        $file = $request->file("image_url");
        $fileName = 'product' . Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        $validatedData['price'] = number_format(preg_replace('/\D/', '', $request->input('price')), 0, ',', '.');
        $validatedData['image_url'] = $fileName;

        Product::create($validatedData);
        return redirect()->route('accounts')->with('success', 'Upload product successfully.');
    }

    /* update profile */
    public function updateProfile(Request $request)
    {
        $validate = $request->validate([
            "id" => "required|integer|exists:users,id",
            "name" => "required|string|max:255"
        ]);

        $user = User::findOrFail($validate["id"]);
        $user->update($validate);

        return redirect()->route('accounts')->with('success', 'User updated successfully.');
    }


    /* change password */
    public function changePassword(Request $request)
    {
        $validate = $request->validate([
            'old' => 'required|string',
            'id' => 'required|integer|exists:users,id',
            'password' => 'required|string|min:5|max:255',
            'confirm' => 'required|string|same:password',
        ]);

        $user = User::findOrFail($validate["id"]);
        if (!Hash::check($validate["old"], $user->password)) {
            return redirect()->route('accounts')->with('error', 'Change password invalid.');
        }

        $user->update(['password' => Hash::make($validate["password"])]);
        return redirect()->route('accounts')->with('success', 'Change password successfully.');

    }
}
