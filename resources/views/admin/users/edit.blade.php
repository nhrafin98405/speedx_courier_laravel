@extends('admin.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">

            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card border-top border-0 border-4 border-white">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="text-white mb-0">
                                 @if ($user->photo)
                                    <img src="{{ asset($user->photo) }}" width="45" height="45"
                                        class="rounded-circle">
                                @endif
                                {{ old('name', $user->name) }}
                            </h4>
                        </div>

                        <div class="row">

                            {{-- Name --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}">
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone', $user->phone) }}">
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Login Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}">
                            </div>

                            {{-- Password --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Leave blank if you don't want to change">
                            </div>

                            {{-- Role --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Role</label>

                                <select name="role" class="form-select">

                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>
                                        Manager
                                    </option>

                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                        User
                                    </option>

                                </select>
                            </div>

                            {{-- Hub --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hub</label>

                                <select name="hub_id" class="form-select">

                                    <option value="">Select Hub</option>

                                    @foreach ($hubs as $hub)
                                        <option value="{{ $hub->id }}"
                                            {{ old('hub_id', $user->hub_id) == $hub->id ? 'selected' : '' }}>
                                            {{ $hub->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- Photo --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Upload Picture</label>

                                <input type="file" name="photo" class="form-control" {{ basename($user->photo) }}>

                                
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>

                                <select name="status" class="form-select">

                                    <option value="active"
                                        {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="inactive"
                                        {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-light ms-auto">
                            <i class="bx bx-save"></i>
                            Update User
                        </button>

                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
