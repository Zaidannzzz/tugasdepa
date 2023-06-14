<?php

namespace App\Http\Controllers;

use App\Models\Custserv;
use App\Models\User;
use Illuminate\Http\Request;

class CustservController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('custserv');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $custservs=Custserv::orderBy('id','desc')->paginate(50);
        $custserv=Custserv::all();
        return view('custserv',compact('custservs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Custserv::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);
        $data=$request->all();
        Custserv::create($data);
        return redirect()->back()->with('success','Data add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.custservadmin', [
            'custserv' => Custserv::get(),   // urut dari yg terbaru/pengganti Descending latest('id')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Custserv $custserv)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customer_services,email,' . $custserv->id,
            'desc' => 'required|string',
        ]);

        $custserv->update($request->all());

        return redirect()->route('custserv')->with('success', 'Customer Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $custservs = Custserv::find($id);
        $custservs->delete();

        return redirect()->route('admin.custservadmin');
    }
}
