@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | ' . $client->first_name . ' ' . $client->last_name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                        <h2 class="card-title">Client Info</h2>
                        <div class="btn-toolbar pb-3">
                            <div class="btn-group">
                                <form method="post" action="{{route('clients.destroy',$client->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

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
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$client->last_name}}">
    
                                @error('last_name')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror                            
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}">
                                @error('email')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="phone_number" class="form-label">Phone number</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder = "###-###-####" value="{{$client->phone_number}}">

                                @error('phone_number')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror                           
                            </div>
                            <div class="col">
                                <label for="language" class="form-label">Language</label>
                                <input type="text" class="form-control" id="language" name="language" placeholder = "Language" value="{{$client->language}}">

                                @error('language')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror                           
                            </div>
                        </div>

                        <hr class="my-3">

                        <div class="col-12 mb-3">
                            <label for="address_line_1" class="form-label">Address 1</label>
                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" value="{{$client->address_line_1}}" placeholder="1234 Main St">
                            @error('address_line_1')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="address_line_2" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="address_line_2" name="address_line_2" value="{{$client->address_line_2}}" placeholder="Apartment, studio, or floor">
                            @error('address_line_2')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder = "City" value="{{$client->city}}">
                            @error('city')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror  
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-select">
                                <option selected>{{$client->state}}</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                            @error('state')
                                <p class="text-danger mt-1">{{$message}}</p>
                            @enderror 
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="postal_code" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder = "ZIP Code" value="{{$client->postal_code}}">
                            @error('phone_number')
                            <p class="text-danger mt-1">{{$message}}</p>
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
                                    <p class="text-danger mt-1">{{$message}}</p>
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
                                    <p class="text-danger mt-1">{{$message}}</p>
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
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror 
                            </div>
                        </div>


                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">
                            Edit client
                            </button>
                  
                            <a href="/clients" class="btn btn-link"> Back to all clients </a>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title">Contact History</h2>
                    @unless(count($contacts) == 0)
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
                                        <td>{{$contact->contact_date->format('F j, Y')}}</td>
                                        <td>{{$contact->contact_type->description}}</td>
                                        <td>{{Str::limit($contact->contact_summary, 300) }} <a href="{{route('clients.contacts.show',['client'=>$client->id,'contact'=>$contact->id])}}"> (View) </a></td>
                                        <td>{{$contact->updated_at->format('F j, Y, g:i a')}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No contacts recorded yet.</p>
                    @endunless
                    <a href="{{route('clients.contacts.create', $client->id)}}" class="btn btn-success">Record contact</a>
                </div>  
            </div>
        </div>
    </div>
</div>    
@endsection
