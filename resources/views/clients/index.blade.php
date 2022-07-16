@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if(session()->has('message'))
            <div class="card mb-3 bg-success">
                <div class="card-body p-3">
                <p class="card-text text-white">
                    {{session('message')}}
                    <a class="link-light" href="/clients/{{session('client_id')}}">Click here</a> to view.
                </p>
                </div>
            </div>
            @endif

            @unless(count($clients) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone #</th>
                                <th scope="col">Email</th>
                                <th scope="col">Language</th>
                                <th scope="col">State</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td><a href="/clients/{{$client->id}}">{{$client->first_name}} {{$client->last_name}}</a></td>
                                        <td>{{$client->phone_number}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->language}}</td>
                                        <td>{{$client->state}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                {{$clients->links()}}
                </div>
            </div>
            @else
                <p>No clients found</p>
            @endunless
        </div>
    </div>
</div>    
@endsection