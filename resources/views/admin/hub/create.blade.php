@extends('admin.master')


@section('content')
<div class="row">
    <div class="col-xl-8 mx-auto">

        <h6 class="mb-0 text-uppercase">Create New Hub</h6>
        <hr>

        <div class="card border-top border-0 border-4 border-white">
            <div class="card-body p-4">

                <form action="{{ route('hub.store') }}" method="POST">
                    @csrf

                    <!-- Hub Information -->
                    <div class="card-title d-flex align-items-center mb-3">
                        <div>
                            <i class="bx bx-buildings me-2 font-22 text-white"></i>
                        </div>
                        <h5 class="mb-0 text-white">Hub Information</h5>
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Hub Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hub Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">District</label>
                            <input type="text" name="district" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Area</label>
                            <input type="text" name="area" class="form-control">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3"></textarea>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- Hub Manager -->
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div class="card-title d-flex align-items-center mb-0">
                            <div>
                                <i class="bx bxs-user me-2 font-22 text-white"></i>
                            </div>
                            <h5 class="mb-0 text-white">Hub Manager</h5>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                   id="createManager" name="create_manager" checked>

                            <label class="form-check-label" for="createManager">
                                Create Manager Account
                            </label>
                        </div>

                    </div>

                    <div id="managerSection">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Manager Name</label>
                                <input type="text" name="manager_name" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="manager_phone" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="manager_email" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-light px-5">
                            <i class="bx bx-plus me-1"></i> Create Hub
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<script>
document.getElementById('createManager').addEventListener('change', function () {
    document.getElementById('managerSection').style.display =
        this.checked ? 'block' : 'none';
});
</script>
@endsection
