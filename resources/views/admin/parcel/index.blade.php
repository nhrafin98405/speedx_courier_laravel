@extends('admin.master')


@section('content')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card radius-10">
                <div class="card-body">

                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">All Parcels (1)</h5>
                        </div>

                        <a href="{{ route('parcel.create') }}" class="btn btn-light ms-auto">
                            <i class="bx bx-plus me-1"></i> New Parcel
                        </a>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th class="text-center text-uppercase">Tracking</th>
                                    <th class="text-center text-uppercase">Sender</th>
                                    <th class="text-center text-uppercase">Receiver</th>
                                    <th class="text-center text-uppercase">From</th>
                                    <th class="text-center text-uppercase">To</th>
                                    <th class="text-center text-uppercase">Status</th>
                                    <th class="text-center text-uppercase">Amount</th>
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

                                        <td class="text-center">{{ $item->senderHub->name ?? '-' }}</td>

                                        <td class="text-center">{{ $item->receiverHub->name ?? '-' }}</td>

                                        <td class="text-center">
                                            <div class="badge rounded-pill bg-light px-3 py-2">
                                                {{ ucfirst($item->status) }}
                                            </div>
                                        </td>

                                        <td class="text-center">৳{{ $item->delivery_charge }}</td>

                                        <td class="text-center">
                                            {{ $item->pickup_date }}
                                        </td>

                                        {{-- <td class="text-center">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <a href="{{ route('parcel.edit',$item->id) }}">
                    <i class="bx bx-edit fs-5"></i>
                </a>

                <form action="{{ route('parcel.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-0 bg-transparent">
                        <i class="bx bx-trash fs-5 text-danger"></i>
                    </button>
                </form>
            </div>
        </td> --}}
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
