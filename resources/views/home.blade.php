@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-3">
                <div class="row">
                    <div class="col-5 m-1">
                        <div class="card-body">
                            <h5 class="card-title mb-1">My Profile</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$user->email}}</h6>
                            <p class="card-text">
                                Class of {{$user->grad_year}}<br>
                                Volunteer since {{$user->created_at->format('Y')}}<br>
                                User ID: {{$user->id}}
                            </p>
                            <a href="#" class="card-link">Edit profile</a>
                            <a href="#" class="card-link">Change password</a>
                        </div>
                    </div>

                    <div class="col-6 m-1">
                        <div class="card-body">
                            <h5 class="card-title mb-1">My Contributions</h5>
                            <ul class="list-group mt-0 list-group-flush text-left">
                                <li class="list-group-item px-0">Clients entered: <b>{{$user->clients->count();}}</b> (<a href="/search?q={{$user->id}}&mode=author_id">See all</a>)</li>
                                <li class="list-group-item px-0">Contacts recorded: <b>{{$user->contacts->count();}}</b> (<a href="/contacts?q={{$user->id}}&mode=author_id">See all</a>)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">{{ __('My recent clients') }}</div>

                <div class="card-body p-4">

                    @unless(count($user->clients) == 0)

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone #</th>
                                <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->clients->take(5) as $client)
                                    <tr>
                                        <td><a href="{{route('clients.show',$client->id)}}">{{$client->first_name}} {{$client->last_name}}</a></td>
                                        <td>{{$client->phone_number}}</td>
                                        <td>{{$client->email}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No clients yet.</p>
                    @endunless
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">{{ __('My recent contacts') }}</div>

                <div class="card-body p-4">
                    @unless(count($user->contacts) == 0)
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
                                @foreach($user->contacts->take(5) as $contact)
                                    <tr>
                                        <td>{{$contact->contact_date->format('F j, Y')}}</td>
                                        <td>{{$contact->contact_type->description}}</td>
                                        <td>{{Str::limit($contact->contact_summary, 200) }} <a href="{{route('clients.contacts.show',['client'=>$client->id,'contact'=>$contact->id])}}"> (View) </a></td>
                                        <td>{{$contact->updated_at->format('F j, Y, g:i a')}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No contacts yet.</p>
                    @endunless
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
