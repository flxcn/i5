@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | Client Search')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @unless(count($clients) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">

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
            <div>
                {{ $clients->withQueryString()->links() }}
            </div>
        </div>
        
            
            </div>
            @else
                <p>No clients found matching your search. <a href="/clients/create">Click here</a> to add a new client.</p>
            @endunless
        </div>
    </div>
</div>    
@endsection