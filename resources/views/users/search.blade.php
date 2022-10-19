@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | User Search')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @unless(count($users) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">

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
                            <td>{{$user->getRoleNames()[0]}}</td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            <div>
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
        
            
            </div>
            @else
                <p>No users found matching your search. <a href="/users/create">Click here</a> to add a new user.</p>
            @endunless
        </div>
    </div>
</div>    
@endsection