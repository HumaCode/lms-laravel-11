@extends('admin.layouts.master')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Course Manajement
                    </div>
                    <h2 class="page-title">
                        Course Languages
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.course-languages.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Add new
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Course Languages</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Document</th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    {{-- @forelse ($instructorRequest as $instructor)
                                                        <tr>
                                                            <td>{{ $instructor->name }}</td>
                                                            <td>
                                                                {{ $instructor->email }}
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($instructor->approved_status === 'pending')
                                                                    <span class="badge bg-yellow text-yellow-fg">
                                                                        Pending
                                                                    </span>
                                                                @elseif($instructor->approved_status === 'approved')
                                                                    <span
                                                                        class="badge bg-green text-green-fg">Approved</span>
                                                                @elseif($instructor->approved_status === 'rejected')
                                                                    <span class="badge bg-red text-red-fg">Rejected</span>
                                                                @endif
                                                            </td>


                                                            <td class="text-center">
                                                                <a href="{{ route('admin.instructor-doc-download', $instructor->id) }}"
                                                                    class="text-muted">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                        <path d="M7 11l5 5l5 -5" />
                                                                        <path d="M12 4l0 12" />
                                                                    </svg>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('admin.instructor-requests.update', $instructor->id) }}"
                                                                    method="POST" class="status-{{ $instructor->id }}">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <select name="status" id="status"
                                                                        class="form-control"
                                                                        onchange="$('.status-{{ $instructor->id }}').submit()">
                                                                        <option value="pending"
                                                                            @selected($instructor->approved_status === 'pending')>
                                                                            Pending</option>
                                                                        <option value="approved"
                                                                            @selected($instructor->approved_status === 'approved')>
                                                                            Approved</option>
                                                                        <option value="rejected"
                                                                            @selected($instructor->approved_status === 'rejected')>
                                                                            Rejected</option>
                                                                    </select>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">No Data Available</td>
                                                        </tr>
                                                    @endforelse --}}

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
