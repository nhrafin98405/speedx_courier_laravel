@extends('admin.master')


@section('content')
    <div class="wrapper">

        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->

                <!--end breadcrumb-->
                <div class="row">

                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row mt-3">
                                    <div class="col-12 col-lg-4">
                                        <div class="card shadow-none border radius-15">
                                            <div class="card-body">

                                                <h5 class="mt-3 mb-0">Admins</h5>
                                                <h3 class="mb-1 mt-4">{{ $adminCount }}</h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="card shadow-none border radius-15">
                                            <div class="card-body">

                                                <h5 class="mt-3 mb-0">Hub Managers</h5>
                                                <h3 class="mb-1 mt-4">{{ $managerCount }}</h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="card shadow-none border radius-15">
                                            <div class="card-body">

                                                <h5 class="mt-3 mb-0">Customers</h5>
                                                <h3 class="mb-1 mt-4">{{ $userCount }}</h3>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- TABLES --}}
                                <div class="card radius-10">
                                    <div class="card-body">

                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h5 class="mb-0">All Users ({{ $users->count() }})</h5>
                                            </div>

                                            <a href="{{ route('users.create') }}" class="btn btn-light ms-auto">
                                                <i class='bx bx-plus-circle'></i> Add Users
                                            </a>
                                        </div>

                                        <hr>

                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle mb-0">

                                                <thead class="table-light">
                                                    <tr>

                                                        <th class="text-center text-uppercase">Photo</th>
                                                        <th class="text-center text-uppercase">name</th>
                                                        <th class="text-center text-uppercase">email</th>
                                                        <th class="text-center text-uppercase">phone</th>
                                                        <th class="text-center text-uppercase">role</th>
                                                        <th class="text-center text-uppercase">hub</th>
                                                        <th class="text-center text-uppercase">status</th>
                                                        <th class="text-center text-uppercase">acion</th>


                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @forelse($users as $usr)
                                                        <tr>



                                                            <td class="text-center">
                                                                @if ($usr->photo)
                                                                    <img src="{{ asset($usr->photo) }}" width="45"
                                                                        height="45" class="rounded-circle">
                                                                @else
                                                                    No Photo
                                                                @endif
                                                            </td>

                                                            <td class="text-center">{{ $usr->name }}</td>

                                                            <td class="text-center">{{ $usr->email }}</td>

                                                            <td class="text-center">{{ $usr->phone }}</td>

                                                            <td class="text-center">{{ $usr->role }}</td>

                                                            <td class="text-center">
                                                                {{ $usr->hub->name ?? '-' }}
                                                            </td>

                                                            <td class="text-center">
                                                                @if ($usr->status == 'active')
                                                                    <span class="badge bg-success">Active</span>
                                                                @else
                                                                    <span class="badge bg-danger">Inactive</span>
                                                                @endif
                                                            </td>

                                                            <td class="text-center">
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center gap-2">

                                                                    <!-- Edit -->
                                                                    <a href="{{ route('users.edit', $usr->id) }}"
                                                                        class="text-white text-decoration-none">
                                                                        <i class='bx bx-edit-alt fs-5'></i>
                                                                    </a>

                                                                    <!-- Delete -->
                                                                    <form action="{{ route('users.destroy', $usr->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button onclick="return confirm('Are you sure to delet this student?')" 
                                                                            class="border-0 bg-transparent text-white p-0">
                                                                            <i class='bx bx-trash fs-5'></i>
                                                                        </button>
                                                                    </form>

                                                                    <!-- Status -->
                                                                    <form action="{{ route('users.status', $usr->id) }}" method="POST">
                                                                        @csrf
                                                                        <div class="form-check form-switch m-0">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                onchange="this.form.submit()"
                                                                                {{ $usr->status == 'active' ? 'checked' : '' }}>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </td>

                                                        </tr>

                                                    @empty

                                                        <tr>
                                                            <td colspan="8" class="text-center">
                                                                No User Found
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>

                                {{-- TABLES END --}}




                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>

    </div>
@endsection
