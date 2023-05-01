<!-- resources/views/scholarship_applications/thankyou.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thank You</div>
                <div class="card-body">
                    <p>Thank you for submitting your scholarship application!</p>
                    @if (session('application_id'))
                        <p>Your application ID is: {{ session('application_id') }}</p>
                        <p>Please save your application ID for future reference.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
