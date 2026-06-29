<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Models\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcel = Parcel::all();
        return view('admin.parcel.index', ['items' => $parcel]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hubs = Hub::all();
        

        return view('admin.parcel.create', compact('hubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(auth()->id());
        Parcel::create([

            'tracking_id' => 'SPX' . rand(100000, 999999),

            'sender_name' => $request->sender_name,
            'sender_phone' => $request->sender_phone,
            'sender_email' => $request->sender_email,
            'sender_hub_id' => $request->sender_hub_id,
            'sender_address' => $request->sender_address,

            'receiver_name' => $request->receiver_name,
            'receiver_phone' => $request->receiver_phone,
            'receiver_email' => $request->receiver_email,
            'receiver_hub_id' => $request->receiver_hub_id,
            'receiver_address' => $request->receiver_address,

            'pickup_date' => $request->pickup_date,
            'estimated_delivery' => $request->estimated_delivery,
            'delivery_charge' => $request->delivery_charge,

            'status' => 'pending',
            'booked_by' => auth()->id(),
        ]);

        return redirect()->route('parcel.index')
                 ->with('success', 'Parcel Booked Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parcel $parcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcel $parcel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcel $parcel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcel $parcel)
    {
        //
    }
}
