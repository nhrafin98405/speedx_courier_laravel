<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HubmanagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $managers = User::with('hub')->where('role', 'manager')->latest()->get();

        return view('admin.hubmanager.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hubs = Hub::all();

        return view('admin.hubmanager.create', compact('hubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'hub_id' => 'required|exists:hubs,id',
            'status' => 'required|in:active,inactive',
        ]);

        $filename = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/users'), $filename);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'manager';
        $user->hub_id = $request->hub_id;
        $user->status = $request->status;
        $user->photo = 'images/users/' . $filename;

        $user->save();

        return redirect()->route('hubmanager.index')
            ->with('success', 'Manager Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $hubmanager)
    {
        $hubs = Hub::all();

        return view('admin.hubmanager.edit', compact('hubmanager', 'hubs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $hubmanager)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $hubmanager->id,
            'password' => 'nullable|min:6',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hub_id' => 'required|exists:hubs,id',
            'status' => 'required|in:active,inactive',
        ]);

        $hubmanager->name = $request->name;
        $hubmanager->phone = $request->phone;
        $hubmanager->email = $request->email;
        $hubmanager->role = 'manager';
        $hubmanager->hub_id = $request->hub_id;
        $hubmanager->status = $request->status;

        if ($request->filled('password')) {
            $hubmanager->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {

            $filename = time() . '.' . $request->photo->extension();

            $request->photo->move(public_path('images/users'), $filename);

            $hubmanager->photo = 'images/users/' . $filename;
        }

        $hubmanager->save();

        return redirect()->route('hubmanager.index')
            ->with('success', 'Manager Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $hubmanager)
    {
        $hubmanager->delete();

        return redirect()->route('hubmanager.index')
            ->with('success', 'Manager Deleted Successfully');
    }
    public function status($id)
    {
        $manager = User::findOrFail($id);

        if ($manager->status == 'active') {
            $manager->status = 'inactive';
        } else {
            $manager->status = 'active';
        }

        $manager->save();

        return redirect()->back()->with('success', 'Manager Status Updated Successfully');
    }
}
