@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body" style="text-align: center;">
                    <p>Name: {{ $user->full_name }} </p>
                    <p>Email: {{ $user->email }} </p>
                    <p>Phone: +91 {{ $user->phone }} </p>
                    <p>Gender: {{ $user->gender }} </p>
                    <p>Date of Birth: {{ $user->dob }} </p>
                    <p>Address: {{ $user->address }} </p>
                    <p>City: {{ $user->city }} </p>
                    <p>State: {{ $user->state }} </p>
                    <p>Zip Code: {{ $user->zip }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
