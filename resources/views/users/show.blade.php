@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | ' . $user->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                        <h2 class="card-title">User Info</h2>
                        <div class="btn-toolbar pb-3">
                            <div class="btn-group">
                                <form method="post" action="{{route('users.destroy',$user->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="client_id" class="form-label">User ID</label>
                                <input class="form-control" type="text" name="user_id" value="{{$user->id}}" aria-label="User ID" readonly>
                            </div>
                            <div class="col">
                                <label for="first_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                @error('name')
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                @error('email')
                                <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" >
                                    <option>Select role</option>
                                    @foreach ($roles as $role)
                                    <option value={{$role->name}} @if ($user->hasAnyRole($roles)) @selected($role->name == $user->getRoleNames()[0]) @endif >{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror 
                            </div>
                        </div>


                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">
                            Edit user
                            </button>
                  
                            <a href="/users" class="btn btn-link"> Back to all users </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body p-4">
                    <h5 class="card-title mb-1">User Contributions</h5>
                    <ul class="list-group mt-0 list-group-flush text-left">
                        <li class="list-group-item px-0">Clients entered: <b>{{$user->clients->count();}}</b> (<a href="/search?q={{$user->id}}&mode=author_id">See all</a>)</li>
                        <li class="list-group-item px-0">Contacts recorded: <b>{{$user->contacts->count();}}</b> (<a href="/contacts?q={{$user->id}}&mode=author_id">See all</a>)</li>
                    </ul>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">{{ __('Recent clients') }}</div>

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
                <div class="card-header">{{ __('Recent contacts') }}</div>

                <div class="card-body p-4">
                    @unless(count($user->contacts) == 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Summary</th>
                                    <th scope="col">Updated</th>
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
