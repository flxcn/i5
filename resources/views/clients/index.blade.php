@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @unless(count($clients) == 0)
            
            <div class="card mb-3">
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
                                @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">{{$client->id}}</th>
                                        <td>{{$client->first_name}}</td>
                                        <td>{{$client->last_name}}</td>
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