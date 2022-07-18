@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | Contacts ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if(session()->has('message'))
            <div class="card mb-3 bg-success">
                <div class="card-body p-3">
                <p class="card-text text-white">
                    {{session('message')}}
                    <a class="link-light" href="/clients/{{session('client_id')}}/contacts/{{session('contact_id')}}">Click here</a> to view.
                </p>
                </div>
            </div>
            @endif

            @unless(count($contacts) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h2 class="card-title mb-2">Contacts with {{$client->first_name}} {{$client->last_name}}</h2>
                    <h6 class="card-subtitle mb-3 text-muted">(<a href="{{route('clients.show',$client->id)}}">Back to client</a>)</h6>
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
                                        <td>{{Str::limit($contact->contact_summary, 1000) }} (<a href="{{route('clients.contacts.show',['client'=>$client->id,'contact'=>$contact->id])}}">Edit contact</a>)</td>
                                        <td>{{$contact->updated_at->format('F j, Y, g:i a')}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                {{$contacts->links()}}
                </div>
            </div>
            @else
                <p>No contacts found. <a href="{{route('clients.show',$client->id)}}">Return to client</a></p> 
            @endunless
        </div>
    </div>
</div>    
@endsection