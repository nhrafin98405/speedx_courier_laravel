@extends('admin.master')


@section('content')
    <div class="page-wrapper">
        <div class="page-content">


            <form action="{{ route('hub.update', $hub->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card border-top border-0 border-4 border-white">
                    <div class="card-body p-4">

                        <!-- ================= Hub Details ================= -->

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-white mb-0">
                                <i class="bx bx-buildings text-success"></i>
                                Hub Details
                            </h4>

                            <div class="form-check form-switch">
                                <input type="checkbox" id="hubSwitch">
                                <label class="form-check-label" for="hubSwitch">
                                    Create Hub
                                </label>
                            </div>
                        </div>

                        <div id="hubSection">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hub Name</label>
                                    <input type="text" name="hub_name" class="form-control" value="{{ $hub->name ??  '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">District</label>
                                    <input type="text" name="district" class="form-control" value="{{ $hub->district ??  '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Thana / Area</label>
                                    <input type="text" name="area" class="form-control" value="{{ $hub->area ??  '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $hub->phone ??  '' }}">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Address</label>

                                    <textarea class="form-control" rows="3" name="address">{{ $hub->address ??  '' }}</textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hub Email</label>
                                    <input type="email" name="hub_email" class="form-control" value="{{ $hub->email ?? '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>

                                    <select class="form-select" name="status">
                                        <option value="1" {{ $hub->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $hub->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>

                                </div>

                            </div>

                        </div>

                        <hr class="my-4">

                        <!-- ================= Manager ================= -->

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h4 class="text-white mb-0">
                                <i class="bx bxs-user text-success"></i>
                                Hub Manager
                            </h4>

                            <div class="form-check form-switch">
                                <input class="form-check-input"  type="checkbox" id="managerSwitch" checked>

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

                                    <input type="text" value="{{ $manager->name ?? '' }}" name="manager_name" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Manager Phone
                                    </label>

                                    <input type="text" value="{{ $manager->phone ?? '' }}" name="manager_phone" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Login Email
                                    </label>

                                    <input type="email" value="{{ $manager->email ?? '' }}" name="manager_email" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Password (Min 6)
                                    </label>

                                    <input type="password" value="{{ $hub->password ??  '' }}" name="password" class="form-control">
                                </div>

                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success px-4 py-2">

                                <i class="bx bx-plus"></i>
                                Edit Hub

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
