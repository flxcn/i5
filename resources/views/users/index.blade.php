@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">

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