@extends('admin.master')


@section('content')
    <div class="page-wrapper">
        <div class="page-content">


            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card border-top border-0 border-4 border-white">
                    <div class="card-body p-4">

                        <!-- ================= Manager ================= -->

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h4 class="text-white mb-0">
                                <i class="bx bxs-user "></i>
                                ADD User's
                            </h4>



                        </div>

                        <div id="managerSection">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Full Name
                                    </label>

                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <input type="text" name="phone" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Login Email
                                    </label>

                                    <input type="email" name="email" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Password (Min 6)
                                    </label>

                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Select Role</label>

                                    <select class="form-select" name="role">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="user">User</option>
                                    </select>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hub</label>

                                    <select name="hub_id" class="form-select">
                                        <option value="">Select Hub</option>

                                        @foreach ($hubs as $hub)
                                            <option value="{{ $hub->id }}">
                                                {{ $hub->name }}
                                            </option>
                                        @endforeach
                                        

                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Uplode Picture
                                    </label>

                                    <input class="form-control mb-3" type="file"
                                        name="photo"accept=".jpg, .png, image/jpeg, image/png">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>

                                    <select name="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>

                                    </select>
                                </div>



                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-light ms-auto">

                                <i class="bx bx-plus"></i>
                                Create User

                            </button>
                        </div>

                    </div>
                </div>

            </form>


        </div>
    </div>
@endsection
