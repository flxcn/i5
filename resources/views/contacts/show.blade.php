@extends('layouts.app')

{{-- @section('title', ' - ' . $client->first_name . ' ' . $client->last_name) --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
            <div class="card mb-3">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                        <h2 class="card-title">Contact Info</h2>
                        <div class="btn-toolbar pb-3">
                            <div class="btn-group">
                                <form method="post" 
                                {{-- action="{{route('contacts.destroy',$contact->id)}}" --}}
                                >
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="/clients/{{$contact->client->id}}/contacts/{{$contact->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="contact_id" class="form-label">ID</label>
                                <input class="form-control" type="number" name="contact_id" value="{{$contact->id}}" aria-label="Client ID" readonly>
                            </div>
                            <div class="col">
                                <label for="contact_date" class="form-label">Contact Date</label>
                                <input type="text" class="form-control" id="contact_date" name="contact_date" value="{{$contact->contact_date}}">
                                @error('contact_date')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="updated_at" class="form-label">Last updated at</label>
                                <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{$contact->updated_at}}" readonly>                       
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="contact_type_id" class="form-label">Referral Source</label>
                                <select id="contact_type_id" name="contact_type_id" class="form-select">
                                    @foreach ($contact_types as $contact_type)
                                    <option value={{$contact_type->id}} @selected($contact->contact_type->description == $contact_type->description)>{{$contact_type->description}}</option>
                                    @endforeach
                                </select>
                                @error('contact_type_id')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror 
                            </div>
                        </div>

                        <hr class="my-3">
                        
                        <div class="form-floating" style="height:500px;">
                            <textarea class="form-control" id="contact_summary" name="contact_summary" placeholder="Leave a comment here" id="contact_summary" style="height: 100%;">{{$contact->contact_summary}}</textarea>
                            <label for="contact_summary">Summary</label>
                        </div>

                        <hr class="my-3">
                    
                        <div class="mb-1 mt-4">
                            <button class="btn btn-success" type="submit">
                            Edit Contact
                            </button>
                  
                            <a href="/clients/{{$contact->client->id}}" class="btn btn-link"> Back to client </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
