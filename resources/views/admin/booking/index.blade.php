@extends('admin.master')


@section('content')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card radius-10">
                <div class="card-body">

                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Resent Bookings</h5>
                        </div>

                        
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th class="text-center text-uppercase">Tracking</th>
                                    <th class="text-center text-uppercase">Sender</th>
                                    <th class="text-center text-uppercase">Receiver</th>
                                    <th class="text-center text-uppercase">Amount</th>
                                    <th class="text-center text-uppercase">Status</th>
                                    
                                    <th class="text-center text-uppercase">Date</th>
                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ $item->tracking_id }}</td>

                                        <td class="text-center">{{ $item->sender_name }}</td>

                                        <td class="text-center">{{ $item->receiver_name }}</td>

                                        <td class="text-center">৳{{ $item->delivery_charge }}</td>

                                        <td class="text-center">
                                            <div class="badge rounded-pill bg-light px-3 py-2">
                                                {{ ucfirst($item->status) }}
                                            </div>
                                        </td>

                                        

                                        <td class="text-center">
                                            {{ $item->pickup_date }}
                                        </td>

                                       
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
