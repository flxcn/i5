@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4">Client Info</h2>
                    {{-- <p class="mb-4">Input client info</p> --}}
                    <form method="POST" action="/clients/{{$client->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="client_id" class="form-label">Client ID</label>
                                <input class="form-control" type="text" name="client_id" value="{{$client->id}}" aria-label="Client ID" readonly>
                            </div>
                            <div class="col">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$client->first_name}}">
                                @error('first_name')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$client->last_name}}">
    
                                @error('last_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror                            
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}">
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="phone_number" class="form-label">Phone number</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder = "###-###-####" value="{{$client->phone_number}}">

                                @error('phone_number')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror                           
                            </div>
                            <div class="col">
                                <label for="language" class="form-label">Language</label>
                                <input type="text" class="form-control" id="language" name="language" placeholder = "Language" value="{{$client->language}}">

                                @error('language')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror                           
                            </div>
                        </div>

                        <hr class="my-3">

                        <div class="col-12 mb-3">
                            <label for="address_line_1" class="form-label">Address 1</label>
                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" value="{{$client->address_line_1}}" placeholder="1234 Main St">
                            @error('address_line_1')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="address_line_2" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="address_line_2" name="address_line_2" value="{{$client->address_line_2}}" placeholder="Apartment, studio, or floor">
                            @error('address_line_2')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder = "City" value="{{$client->city}}">
                            @error('city')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror  
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="state" class="form-label">State</label>
                            <select id="state" class="form-select">
                              <option selected>{{$client->state}}</option>
                              <option>...</option>
                            </select>
                            @error('state')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror 
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="postal_code" class="form-label">ZIP Code</label>
                            <input type="tel" class="form-control" id="postal_code" name="postal_code" placeholder = "ZIP Code" value="{{$client->postal_code}}">
                            @error('phone_number')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror    
                        </div>
                        </div>

                        <hr class="my-3">

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select id="category_id" name="category_id" class="form-select">
                                    @foreach ($categories as $category)
                                    <option value={{$category->id}} @selected($client->category->description == $category->description)>{{$category->description}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror 
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <label for="case_type_id" class="form-label">Case Type</label>
                                <select id="case_type_id" name="case_type_id" class="form-select">
                                    @foreach ($case_types as $case_type)
                                    <option value={{$case_type->id}}  @selected($client->case_type->description == $case_type->description)>{{$case_type->description}}</option>
                                    @endforeach
                                </select>
                                @error('case_type_id')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror 
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <label for="referral_source_id" class="form-label">Referral Source</label>
                                <select id="referral_source_id" name="referral_source_id" class="form-select">
                                    @foreach ($referral_sources as $referral_source)
                                    <option value={{$referral_source->id}} @selected($client->referral_source->description == $referral_source->description)>{{$referral_source->description}}</option>
                                    @endforeach
                                </select>
                                @error('referral_source_id')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror 
                            </div>
                        </div>


                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">
                            Edit client
                            </button>
                  
                            <a href="{{url()->previous()}}" class="btn btn-link"> Back </a>
                        </div>
                    </form>
                </div>
            </div>

            @unless(count($contacts) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title">Contact History</h2>
                    <h6 class="card-subtitle text-muted mb-4">(<a href="/clients/{{$client->id}}/contacts">See all</a>)</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Contact Date</th>
                                    <th scope="col">Contact Type</th>
                                    <th scope="col">Summary</th>
                                    <th scope="col">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$contact->contact_date}}</td>
                                        <td>{{$contact->contact_type->description}}</td>
                                        <td>{{Str::limit($contact->contact_summary, 300) }}</td>
                                        <td>{{$client->updated_at}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
                <p>No contacts found</p>
            @endunless
            
        </div>
    </div>
</div>    
@endsection
