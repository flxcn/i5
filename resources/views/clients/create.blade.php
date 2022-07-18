@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | Create Client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title">New Client</h2>
                    <p class="mb-4">Input client info</p></h2>
                    <form method="POST" action="/clients" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}">

                            @error('first_name')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">

                            @error('last_name')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">

                            @error('email')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder = "###-###-####" value="{{old('phone_number')}}">

                            @error('phone_number')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                  
                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">
                            Add client
                            </button>
                  
                            <a href="/clients" class="btn btn-link"> Back </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection