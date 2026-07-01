@extends('admin.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">

        <form action="{{ route('hubmanager.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-white mb-0">
                            <i class="bx bxs-user"></i>
                            ADD Manager
                        </h4>
                    </div>

                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') }}">
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone') }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Login Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email') }}">
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password (Min 6)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <!-- Hub -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hub</label>

                            <select name="hub_id" class="form-select">
                                <option value="">Select Hub</option>

                                @foreach($hubs as $hub)
                                    <option value="{{ $hub->id }}"
                                        {{ old('hub_id') == $hub->id ? 'selected' : '' }}>
                                        {{ $hub->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>

                            <select name="status" class="form-select">
                                <option value="">Select Status</option>

                                <option value="active"
                                    {{ old('status') == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="inactive"
                                    {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Photo -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Upload Picture</label>

                            <input type="file"
                                   name="photo"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png,image/jpeg,image/png">
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-light">
                            <i class="bx bx-plus"></i>
                            Create Manager
                        </button>
                    </div>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection