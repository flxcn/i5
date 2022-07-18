@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | Create Contact')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title">New Contact</h2>
                    <p class="mb-4">Input contact info</p></h2>

                    <form method="POST" action="{{route('clients.contacts.store',$client->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="contact_date" class="form-label">Contact Date</label>
                                <input type="date" class="form-control" id="contact_date" name="contact_date" value="{{old('contact_date')}}" style="height:2.4rem">
                                @error('contact_date')
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="contact_type_id" class="form-label">Contact Type</label>
                                <select id="contact_type_id" name="contact_type_id" class="form-select" style="height:2.4rem">
                                    @foreach ($contact_types as $contact_type)
                                    <option value={{$contact_type->id}}>{{$contact_type->description}}</option>
                                    @endforeach
                                </select>
                                @error('contact_type_id')
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror 
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating" style="height:500px;">
                                    <textarea class="form-control" id="contact_summary" name="contact_summary" placeholder="Leave a comment here" id="contact_summary" style="height: 100%;"></textarea>
                                    <label for="contact_summary">Summary</label>
                                </div>
                                @error('contact_summary')
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror 
                            </div>
                        </div>

                        <hr>
                    
                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">Create Contact</button>
                            <a href="/clients/{{$client->id}}" class="btn btn-link"> Back to client </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection