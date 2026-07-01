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

                               

                                {{-- TABLES --}}
                                <div class="card radius-10">
                                    <div class="card-body">

                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h5 class="mb-0">Hub Managers ()</h5>
                                            </div>

                                            <a href="{{ route('hubmanager.create') }}" class="btn btn-light ms-auto">
                                                <i class='bx bx-plus-circle'></i> New Manager
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
                                                        
                                                        <th class="text-center text-uppercase">hub</th>
                                                        <th class="text-center text-uppercase">status</th>
                                                        <th class="text-center text-uppercase">acion</th>


                                                    </tr>
                                                </thead>

                                               <tbody>

@forelse($managers as $manager)

<tr>

    <td class="text-center">
        @if($manager->photo)
            <img src="{{ asset($manager->photo) }}" width="45" height="45" class="rounded-circle">
        @else
            No Photo
        @endif
    </td>

    <td class="text-center">
        {{ $manager->name }}
    </td>

    <td class="text-center">
        {{ $manager->email }}
    </td>

    <td class="text-center">
        {{ $manager->phone }}
    </td>

    <td class="text-center">
        {{ $manager->hub->name ?? '-' }}
    </td>

    <td class="text-center">
        @if($manager->status == 'active')
            <span class="badge bg-success">Active</span>
        @else
            <span class="badge bg-danger">Inactive</span>
        @endif
    </td>

    <td class="text-center">
        <div class="d-flex justify-content-center align-items-center gap-2">

            <!-- Edit -->
            <a href="{{ route('hubmanager.edit', $manager->id) }}"
                class="text-white text-decoration-none">
                <i class='bx bx-edit-alt fs-5'></i>
            </a>

            <!-- Delete -->
            <form action="{{ route('hubmanager.destroy', $manager->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                    onclick="return confirm('Are you sure to delete this manager?')"
                    class="border-0 bg-transparent text-white p-0">
                    <i class='bx bx-trash fs-5'></i>
                </button>
            </form>

            <!-- Status -->
            <form action="{{ route('hubmanager.status', $manager->id) }}" method="POST">
                @csrf

                <div class="form-check form-switch m-0">
                    <input class="form-check-input"
                           type="checkbox"
                           onchange="this.form.submit()"
                           {{ $manager->status == 'active' ? 'checked' : '' }}>
                </div>
            </form>

        </div>
    </td>

</tr>

@empty

<tr>
    <td colspan="7" class="text-center">
        No Manager Found
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
