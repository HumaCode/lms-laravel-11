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
                        Courses
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.course-levels.create') }}" class="btn btn-primary d-none d-sm-inline-block">
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
                                    <h3 class="card-title">Courses</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Instructor</th>
                                                        <th>Status</th>
                                                        <th>Approved</th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($courses as $course)
                                                        <tr>
                                                            <td>{{ $course->title }}</td>
                                                            <td class="text-center">
                                                                {{ $course->price }}
                                                            </td>
                                                            <td>{{ $course->instructor->name }}</td>
                                                            <td>
                                                                @if ($course->is_approved == 'pending')
                                                                    <span
                                                                        class="badge bg-yellow text-yellow-fg">Pending</span>
                                                                @elseif($course->is_approved == 'approved')
                                                                    <span
                                                                        class="badge bg-green text-green-fg">Approved</span>
                                                                @elseif($course->is_approved == 'rejected')
                                                                    <span class="badge bg-red text-red-fg">Rejected</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <select name="" id=""
                                                                    class="form-control update-approval-status"
                                                                    data-id="{{ $course->id }}">
                                                                    <option disabled selected>-- Select --</option>
                                                                    <option @selected($course->is_approved == 'pending') value="pending">
                                                                        Pending</option>
                                                                    <option @selected($course->is_approved == 'approved') value="approved">
                                                                        Approved</option>
                                                                    <option @selected($course->is_approved == 'rejected') value="rejected">
                                                                        Rejected</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{ route('admin.course-levels.edit', $course->id) }}"
                                                                    class="btn-sm btn-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                        <path d="M13.5 6.5l4 4" />
                                                                    </svg>
                                                                </a>

                                                                <a href="{{ route('admin.course-levels.destroy', $course->id) }}"
                                                                    class="btn-sm text-red delete-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M4 7l16 0" />
                                                                        <path d="M10 11l0 6" />
                                                                        <path d="M14 11l0 6" />
                                                                        <path
                                                                            d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                        <path
                                                                            d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    </svg>
                                                                </a>
                                                            </td>

                                                        </tr>
                                                    @empty
                                                        <tr class="text-center">
                                                            <td colspan="6">No Data Available</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>

                                            <div class="p-3">
                                                {{ $courses->links() }}
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
    </div>
@endsection


@push('header_scripts')
    @vite(['resources/js/admin/course.js'])
@endpush
