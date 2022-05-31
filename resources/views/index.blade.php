@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('SCAS Client Contact Database') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to the Small Claims Advisory Service\'s i5 database. For any questions, please contact felixchen@college.harvard.edu') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection