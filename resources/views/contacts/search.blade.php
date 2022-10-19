@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | Contact Search')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @unless(count($contacts) == 0)
            
            <div class="card mb-3">
                <div class="card-body p-4">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Client Name</th>
                        <th scope="col">Contact Type</th>
                        <th scope="col">Contact Date</th>
                        <th scope="col">Summary</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row"><a href="/clients/{{$contact->client->id}}">{{$contact->client->first_name}} {{$contact->client->last_name}}</a></th>
                            <td>{{$contact->contact_type->description}}</td>
                            <td>{{$contact->contact_date}}</td>
                            <td>{{Str::limit($contact->contact_summary, 1000) }}</td>
                            <td>{{$contact->created_at}}</td>
                            <td>{{$contact->updated_at}}</td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            <div>
                {{ $contacts->withQueryString()->links() }}
            </div>
        </div>
        
            
            </div>
            @else
                <p>No contacts found matching your search. <a href="/clients/create">Click here</a> to add a new client.</p>
            @endunless
        </div>
    </div>
</div>    
@endsection