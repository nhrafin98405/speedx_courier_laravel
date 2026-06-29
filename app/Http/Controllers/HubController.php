<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hubs = Hub::latest()->get();

        return view('admin.hub.index', compact('hubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hubs = Hub::all();

        return view('admin.hub.create', compact('hubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        // dd($request->all());

        $request->validate([
            'hub_name' => 'required',
            'district' => 'required',
            'area' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        // Hub Code Generate
        $code = 'HUB' . str_pad(Hub::count() + 1, 3, '0', STR_PAD_LEFT);

        // Hub Save
        $hub = Hub::create([
            'name' => $request->hub_name,
            'code' => $code,
            'district' => $request->district,
            'area' => $request->area,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->hub_email,
            'status' => $request->status,
        ]);

        // Manager Save
        User::create([
            'hub_id' => $hub->id,
            'name' => $request->manager_name,
            'phone' => $request->manager_phone,
            'email' => $request->manager_email,
            'password' => Hash::make($request->password),
            'role' => 'manager',
        ]);

        return redirect()->route('hub.index')
            ->with('success', 'Hub Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hub $hub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Hub $hub)
{
    $manager = User::where('hub_id', $hub->id)->first();

    return view('admin.hub.edit', compact('hub', 'manager'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Hub $hub)
{
    // Hub update
    $hub->update([
        'name' => $request->hub_name,
        'district' => $request->district,
        'area' => $request->area,
        'phone' => $request->phone,
        'address' => $request->address,
        'email' => $request->hub_email,
        'status' => $request->status,
    ]);

    // Manager update
    $manager = User::where('hub_id', $hub->id)->first();

    if ($manager) {
        $manager->update([
            'name' => $request->manager_name,
            'phone' => $request->manager_phone,
            'email' => $request->manager_email,
        ]);
    }

    return redirect()->route('hub.index')->with('success', 'Updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hub $hub)
    {

        
        $hub->delete();

        return redirect()->back()->with('success', 'Deleted successfully');
    }
public function status(Hub $hub)
{
    $hub->status = $hub->status == 'active' ? 'inactive' : 'active';
    $hub->save();

    return redirect()->back();
}
}
