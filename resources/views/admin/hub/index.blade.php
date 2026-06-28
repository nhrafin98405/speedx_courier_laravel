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
                                    <th class="text-center text-uppercase">code</th>
                                    <th class="text-center text-uppercase">name</th>
                                    <th class="text-center text-uppercase">district</th>
                                    <th class="text-center text-uppercase">address</th>
                                    <th class="text-center text-uppercase">phone</th>
                                    <th class="text-center text-uppercase">manager</th>
                                    <th class="text-center text-uppercase">status</th>
                                    <th class="text-center text-uppercase">acion</th>

                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td class="text-center">GSA</td>

                                    <td class="text-center">NHR</td>

                                    <td class="text-center">Mymensingh</td>

                                    <td class="text-center">Saddar road</td>

                                    <td class="text-center">0839254984</td>

                                    <td class="text-center">Rafin</td>

                                    <td class="text-center">Active</td>



                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            <a href="">
                                                <i class="bx bx-edit fs-5"></i>
                                            </a>

                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="bx bx-trash fs-5 text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                               
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
