@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="d-flex ms-5">  
                <form action="/users/search" method="get">  
                    <div class="input-group ms-1">
                        <a href="/clients/create" class="btn btn-outline-success rounded">Add&nbsp;Client</a>
            
                        <input type="text" name="q" class="form-control bg-white ms-2 rounded-start" placeholder="Search the i5..." aria-label="Search the i5..." value= @if(isset($clients)) {{ request()->query('q'); }} @else {{ "" }} @endif>
                        <button class="btn btn-outline-primary" type="submit">Find&nbsp;Client</button>
                        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><button class="dropdown-item" type="submit" name="mode" value="name">By Name</button></li>
                            <li><button class="dropdown-item" type="submit" name="mode" value="email">By Email</button></li>
                            <li><button class="dropdown-item" type="submit" name="mode" value="phone">By Phone</button></li>
            
                            <li><hr class="dropdown-divider"></li>
            
                            <li><a class="dropdown-item" href="/clients">Most Recent</a></li>
                            <li><button class="dropdown-item" type="submit" name="mode" value="urgent">Most Urgent</button></li>
                        </ul>
                    </div>
                </form>
            </div>            

            @unless(count($users) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Grad. Year</th>
                                <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->grad_year}}</td>
                                        <td>
                                            @if ($user->hasAnyRole($roles))
                                            {{ $user->getRoleNames()[0] }}
                                            @else
                                            N/A 
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                {{$users->links()}}
                </div>
            </div>
            @else
                <p>No users found.</p>
            @endunless
        </div>
    </div>
</div>    
@endsection