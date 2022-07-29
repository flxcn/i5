@extends('layouts.app')

@section('title', config('app.name', 'i5') . ' | View Contact')

@section('title', ' - ' .)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                        <h2 class="card-title">Contact with {{$contact->client->first_name . " " . $contact->client->last_name}} <span class="text-secondary text-sm">#{{$contact->id}}</span></h2>

                        @can('delete contacts')
                        <div class="btn-toolbar pb-3">
                            <div class="btn-group">
                                <form method="post" action="{{route('clients.contacts.destroy', ['client' => $contact->client->id, 'contact' => $contact->id])}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endcan
                    </div>

                    <form method="POST" action="{{route('clients.contacts.update', ['client' => $contact->client->id, 'contact' => $contact->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="contact_date" class="form-label">Contact Date</label>
                                <input type="date" class="form-control" id="contact_date" name="contact_date" value="{{$contact->contact_date->format('Y-m-d')}}" style="height:2.4rem">
                                @error('contact_date')
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="contact_type_id" class="form-label">Contact Type</label>
                                <select id="contact_type_id" name="contact_type_id" class="form-select" style="height:2.4rem">
                                    @foreach ($contact_types as $contact_type)
                                    <option value={{$contact_type->id}} @selected($contact->contact_type->description == $contact_type->description)>{{$contact_type->description}}</option>
                                    @endforeach
                                </select>
                                @error('contact_type_id')
                                    <p class="text-danger mt-1">{{$message}}</p>
                                @enderror 
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="updated_at" class="form-label">Last updated at</label>
                                <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="{{$contact->updated_at}}" readonly style="height:2.4rem">                       
                            </div>
                        </div>

                        <hr class="my-3">
                        
                        <div class="form-floating" style="height:500px;">
                            <textarea class="form-control" id="contact_summary" name="contact_summary" placeholder="Leave a comment here" id="contact_summary" style="height: 100%;">{{$contact->contact_summary}}</textarea>
                            <label for="contact_summary">Summary</label>
                        </div>

                        <hr class="my-3">
                    
                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">Edit Contact</button>
                            <a href="/clients/{{$contact->client->id}}" class="btn btn-link"> Back to client </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
