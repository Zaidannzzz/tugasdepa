<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function index()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bank' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $bukti = new Bukti();
        $bukti->name = $request->input('name');
        $bukti->bank = $request->input('bank');

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $bukti['image'] = $imageName;
        }

        $bukti->save();
        return redirect()->route('upload');
    }

    public function show(Bukti $bukti)
    {
        $bukti = Bukti::findOrFail($bukti);
        return view('admin.invoiceadmin', compact('bukti'));
    }

}
