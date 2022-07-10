@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4">Client Info</h2>
                    {{-- <p class="mb-4">Input client info</p> --}}
                    <form method="POST" action="/clients" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                          <label for="client_id" class="form-label">Client ID</label>
                          <input class="form-control" type="text" name="client_id" value="{{$client->id}}" aria-label="Client ID" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$client->first_name}}">

                            @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$client->last_name}}">

                            @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}}">

                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder = "###-###-####" value="{{$client->phone_number}}">

                            @error('phone_number')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                  
                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">
                            Edit client
                            </button>
                  
                            <a href="/clients" class="btn btn-link"> Back </a>
                        </div>
                    </form>
                </div>
            </div>

            @unless(count($contacts) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title">Contacts</h2>
                    <h6 class="card-subtitle text-muted mb-4">(<a href="/clients/{{$client->id}}/contacts">See all</a>)</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Contact ID</th>
                                    <th scope="col">Contact Type</th>
                                    <th scope="col">Contact Date</th>
                                    <th scope="col">Summary</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{$contact->id}}</th>
                                        <td>{{$contact->contact_type_id}}</td>
                                        <td>{{$contact->contact_date}}</td>
                                        <td>{{Str::limit($contact->contact_summary, 300) }}</td>
                                        <td>{{$contact->created_at}}</td>
                                        <td>{{$client->updated_at}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                {{-- {{$contacts->links()}} --}}
                </div>
            </div>
            @else
                <p>No contacts found</p>
            @endunless
            
        </div>
    </div>
</div>    
@endsection
