@extends('admin.master')


@section('content')
    <div class="page-wrapper">
        <div class="page-content">


            <form action="{{ route('hub.store') }}" method="POST">
                @csrf

                <div class="card border-top border-0 border-4 border-white">
                    <div class="card-body p-4">

                        <!-- ================= Hub Details ================= -->

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-white mb-0">
                                <i class="bx bx-buildings "></i>
                                Hub Details
                            </h4>

                            <div class="form-check form-switch">
                                <input type="checkbox" id="hubSwitch" checked>
                                <label class="form-check-label" for="hubSwitch">
                                    Create Hub
                                </label>
                            </div>
                        </div>

                        <div id="hubSection">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hub Name</label>
                                    <input type="text" name="hub_name" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">District</label>
                                    <input type="text" name="district" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Thana / Area</label>
                                    <input type="text" name="area" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Address</label>

                                    <textarea class="form-control" rows="3" name="address"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hub Email</label>
                                    <input type="email" name="hub_email" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>

                                    <select class="form-select" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>

                                </div>

                            </div>

                        </div>

                        <hr class="my-4">

                        <!-- ================= Manager ================= -->

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h4 class="text-white mb-0">
                                <i class="bx bxs-user "></i>
                                Hub Manager
                            </h4>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="managerSwitch" checked>

                                <label class="form-check-label" for="managerSwitch">
                                    Create new manager account
                                </label>
                            </div>

                        </div>

                        <div id="managerSection">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Manager Full Name
                                    </label>

                                    <input type="text" name="manager_name" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Manager Phone
                                    </label>

                                    <input type="text" name="manager_phone" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Login Email
                                    </label>

                                    <input type="email" name="manager_email" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Password (Min 6)
                                    </label>

                                    <input type="password" name="password" class="form-control">
                                </div>

                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-light ms-auto">

                                <i class="bx bx-plus"></i>
                                Create Hub

                            </button>
                        </div>

                    </div>
                </div>

            </form>
            <script>
                document.addEventListener("DOMContentLoaded", function() {

                    const hubSwitch = document.getElementById("hubSwitch");
                    const managerSwitch = document.getElementById("managerSwitch");

                    const hubSection = document.getElementById("hubSection");
                    const managerSection = document.getElementById("managerSection");

                    // Initial State
                    hubSection.hidden = !hubSwitch.checked;
                    managerSection.hidden = !managerSwitch.checked;

                    // Hub Toggle
                    hubSwitch.addEventListener("change", function() {
                        hubSection.hidden = !this.checked;
                    });

                    // Manager Toggle
                    managerSwitch.addEventListener("change", function() {
                        managerSection.hidden = !this.checked;
                    });

                });
            </script>

        </div>
    </div>
@endsection
