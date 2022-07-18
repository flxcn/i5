@extends('layouts.app')

@section('title', config('app.name', 'i5'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('SCAS i5 Client Contact Database') }}</div>

                <div class="card-body">
                    <p>Welcome to the Small Claims Advisory Service's <b>i5 database</b>!<br>You can find the code repository for this platform <a href="https://github.com/flxcn/i5">here</a>.</p> 
                </div>
            </div>

            <div class="card">
                <div class="card-header text-success">Updates from the i4</div>

                <div class="card-body">
                    <p>The i5 is a completely rewritten-from-scratch database platform for tracking our client contacts.<br>A few important differences:</p>
                    <ul>
                        <li>Your username is now your @college email.</li>
                        <li>For previous i4 users, please click "Forgot Your Password?" in order to set a new one.</li>
                    </ul>
                    <p>For any questions, please contact <a href="mailto:{{ __('messages.webmaster_email')}}">{{ __('messages.webmaster_name')}}</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection