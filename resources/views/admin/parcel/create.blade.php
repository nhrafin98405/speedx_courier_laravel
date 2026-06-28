@extends('admin.master')


@section('content')
    <div class="row">
        <div class="col-xl-8 mx-auto">

            <h6 class="mb-0 text-uppercase">Book a Delivery</h6>
            <hr>

            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body p-4">

                    <form action="{{ route('parcel.store') }}" method="POST">
                        @csrf

                        <!-- Sender Information -->
                        <div class="card-title d-flex align-items-center mb-3">
                            <div>
                                <i class="bx bxs-user me-2 font-22 text-white"></i>
                            </div>
                            <h5 class="mb-0 text-white">From (Sender)</h5>
                        </div>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Sender Name</label>
                                <input type="text" name="sender_name" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="sender_phone" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="sender_email" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Origin Hub</label>
                                <select name="sender_hub_id" class="form-select">
                                    <option value="">Select Hub</option>

                                    @foreach ($hubs as $hub)
                                        <option value="{{ $hub->id }}">
                                            {{ $hub->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea name="sender_address" class="form-control" rows="3"></textarea>
                            </div>

                        </div>

                        <hr class="my-4">

                        <!-- Receiver Information -->
                        <div class="card-title d-flex align-items-center mb-3">
                            <div>
                                <i class="bx bxs-user me-2 font-22 text-white"></i>
                            </div>
                            <h5 class="mb-0 text-white">To (Receiver)</h5>
                        </div>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Receiver Name</label>
                                <input type="text" name="receiver_name" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="receiver_phone" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="receiver_email" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Destination Hub</label>
                                <select name="receiver_hub_id" class="form-select">
                                    <option value="">Select Hub</option>

                                    @foreach ($hubs as $hub)
                                        <option value="{{ $hub->id }}">
                                            {{ $hub->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea name="receiver_address" class="form-control" rows="3"></textarea>
                            </div>

                        </div>

                        <hr class="my-4">

                        <!-- Booking Information -->
                        <div class="card-title d-flex align-items-center mb-3">
                            <div>
                                <i class="bx bx-package me-2 font-22 text-white"></i>
                            </div>
                            <h5 class="mb-0 text-white">Booking Information</h5>
                        </div>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Pickup Date</label>
                                <input type="date" name="pickup_date" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Estimated Delivery</label>
                                <input type="date" name="estimated_delivery" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Delivery Charge</label>
                                <input type="number" name="delivery_charge" class="form-control">
                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-light px-5">
                                <i class="bx bx-save"></i> Book Delivery
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
