@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Scholarship Applications</h1>
	@if (session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('success') }}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif

    <a href="{{ route('scholarship_applications.create') }}" class="btn btn-primary">Create New Application</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->full_name }}</td>
                    <td>{{ $application->email }}</td>
                    <td>
                        <a href="{{ route('scholarship_applications.show', $application->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('scholarship_applications.edit', $application->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
