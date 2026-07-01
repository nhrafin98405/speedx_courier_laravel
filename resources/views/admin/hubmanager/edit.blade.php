@extends('admin.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">

        <form action="{{ route('hubmanager.update', $hubmanager->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-white mb-0">
                            @if($hubmanager->photo)
                                <img src="{{ asset($hubmanager->photo) }}"
                                     width="80"
                                     height="80"
                                     class="rounded-circle mb-2">
                            @else
                                <p>No Photo</p>
                            @endif
                            {{ old('name', $hubmanager->name) }}
                        </h4>
                    </div>

                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $hubmanager->name) }}">
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $hubmanager->phone) }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Login Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $hubmanager->email) }}">
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password (Leave blank if no change)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <!-- Hub -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hub</label>

                            <select name="hub_id" class="form-select">
                                <option value="">Select Hub</option>

                                @foreach($hubs as $hub)
                                    <option value="{{ $hub->id }}"
                                        {{ old('hub_id', $hubmanager->hub_id) == $hub->id ? 'selected' : '' }}>
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
                                    {{ old('status', $hubmanager->status) == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="inactive"
                                    {{ old('status', $hubmanager->status) == 'inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Current Photo -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Current Picture</label><br>

                            
                        </div>

                        <!-- New Photo -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Change Picture</label>

                            <input type="file"
                                   name="photo"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png,image/jpeg,image/png">
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-light">
                            <i class="bx bx-save"></i>
                            Update Manager
                        </button>
                    </div>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection