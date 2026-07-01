<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $users = User::with('hub')->latest()->get();


        $adminCount = User::where('role', 'admin')->count();
        $managerCount = User::where('role', 'manager')->count();
        $userCount = User::where('role', 'user')->count();


        return view('admin.users.index', compact(
            'users',
            'userCount',
            'adminCount',
            'managerCount',

        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hubs = Hub::all();
        return view('admin.users.create', compact('hubs'));
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
            'role' => 'required|in:admin,manager,user',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'hub_id' => 'nullable|exists:hubs,id',
            'status' => 'required|in:active,inactive',

        ]);

        $filename = time() . '.' . $request->photo->extension();

        $request->photo->move(public_path('images/users/'), $filename);

        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->hub_id = $request->hub_id;
        $user->status = $request->status;
        $user->photo = 'images/users/' . $filename;

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        $hubs = Hub::all();

        return view('admin.users.edit', compact('user', 'hubs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $request->validate([

        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
        'role' => 'required|in:admin,manager,user',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'hub_id' => 'nullable|exists:hubs,id',
        'status' => 'required|in:active,inactive',

    ]);

    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->hub_id = $request->hub_id;
    $user->status = $request->status;

    // Password update (only if entered)
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Photo update (only if new photo uploaded)
    if ($request->hasFile('photo')) {

        $filename = time() . '.' . $request->photo->extension();

        $request->photo->move(public_path('images/users'), $filename);

        $user->photo = 'images/users/' . $filename;
    }

    $user->save();

    return redirect()->route('users.index')
                     ->with('success', 'User Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Deleted successfully');
    }
    public function status($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }

        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully.');
    }
}
