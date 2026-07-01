@extends('admin.master')


@section('content')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card radius-10">
                <div class="card-body">

                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">All Hub ( {{ $hubs->count() }} )</h5>
                        </div>

                        <a href="{{ route('hub.create') }}" class="btn btn-light ms-auto">
                            <i class='bx bx-plus-circle'></i> Add Hub/Manager
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

                                @forelse($hubs as $hub)
                                    <tr>

                                        <td class="text-center">{{ $hub->code }}</td>

                                        <td class="text-center">{{ $hub->name }}</td>

                                        <td class="text-center">{{ $hub->district }}</td>

                                        <td class="text-center">{{ $hub->address }}</td>

                                        <td class="text-center">{{ $hub->phone }}</td>

                                        <td class="text-center">
                                            {{ optional($hub->manager)->name ?? 'No Manager' }}
                                        </td>

                                        <td class="text-center">
                                            @if ($hub->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <!-- Edit -->
                                                <a href="{{ route('hub.edit', $hub->id) }}"
                                                    class="text-white text-decoration-none">
                                                    <i class='bx bx-edit-alt fs-5'></i>
                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('hub.destroy', $hub->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('Are you sure you want to delete this hub?')" type="submit" class="border-0 bg-transparent text-white p-0">
                                                        <i class='bx bx-trash fs-5'></i>
                                                    </button>
                                                </form>

                                                <!-- Status -->
                                                <form action="{{ route('hub.status', $hub->id) }}" method="GET">
                                                    <div class="form-check form-switch m-0">
                                                        <input class="form-check-input" type="checkbox"
                                                            onchange="this.form.submit()"
                                                            {{ $hub->status == 'active' ? 'checked' : '' }}>
                                                    </div>
                                                </form>

                                            </div>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No Hub Found
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
