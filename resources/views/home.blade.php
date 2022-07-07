@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card mb-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-success">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            <div class="card mb-3">
                <div class="row">
                <div class="col-5 m-1">
                    <div class="card-body">
                        <h5 class="card-title">My Profile</h5>
                        <h6 class="card-subtitle mb-2 text-muted">firstlast@college.harvard.edu</h6>
                        <p class="card-text">
                            Class of 2025<br>
                            SCAS Member since 2021<br>
                            User ID: 2534
                        </p>
                        <a href="#" class="card-link">Edit profile</a>
                        <a href="#" class="card-link">Change password</a>
                    </div>
                </div>

                <div class="col-6 m-1">
                    <div class="card-body">
                        <h5 class="card-title">My Contributions</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Clients entered: <b>9</b> (<a href="/clients/author_id={{Auth::user()->id}}">See all</a>)</li>
                            <li class="list-group-item">Contacts recorded: <b>12</b> (<a href="/clients/author_id={{Auth::user()->id}}">See all</a>)</li>
                            {{-- <li class="list-group-item">Contacts edited: <b>3</b></li> --}}
                        </ul>
                    </div>
                </div>

                </div>

                {{-- <div class="card-header">My Recent Contributions</div>
                    my previous contacts

                    resources

                    contacts/index
                </div> --}}
            </div>

            <div class="card mb-3">
                <div class="card-header">{{ __('My clients') }}</div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Client ID</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Phone #</th>
                                <th scope="col">Email</th>
                                <th scope="col">Language</th>
                                <th scope="col">State</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">{{$client->id}}</th>
                                        <td>{{$client->first_name}}</td>
                                        <td>{{$client->last_name}}</td>
                                        <td>{{$client->phone_number}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->language}}</td>
                                        <td>{{$client->state}}</td>
                                    </tr>
                                @endforeach  --}}
                            </tbody>
                        </table>
                    </div>
                {{-- {{$clients->links()}} --}}
                </div>
                
            </div>

            <div class="card mb-3">
                <div class="card-header">{{ __('Recent contacts') }}</div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Client ID</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Phone #</th>
                                <th scope="col">Email</th>
                                <th scope="col">Language</th>
                                <th scope="col">State</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">{{$client->id}}</th>
                                        <td>{{$client->first_name}}</td>
                                        <td>{{$client->last_name}}</td>
                                        <td>{{$client->phone_number}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->language}}</td>
                                        <td>{{$client->state}}</td>
                                    </tr>
                                @endforeach  --}}
                            </tbody>
                        </table>
                    </div>
                {{-- {{$clients->links()}} --}}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
