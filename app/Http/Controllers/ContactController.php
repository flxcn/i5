<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client_id)
    {
        return view('contacts.index', [
            'contacts' => Contact::where('client_id', $client_id)->paginate(),
            'client' => Client::find($client_id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id)
    {
        return view('contacts.create', [
            'client' => Client::find($client_id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($client_id, Request $request)
    {
        Contact::create($request->all() + ['client_id' => $client_id]);
        return redirect()->route('clients.contacts.index', $client_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($client_id, Contact $contact)
    {
        return view('contacts.show', [
            'contact' => Contact::find($contact->id),
            'contact_types' => ContactType::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id, Contact $contact)
    {
        return view('contacts.edit', compact('client_id', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($client_id, Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('clients.contacts.index', $client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id, Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index', $contact->id);
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $query = $request->input('q');
        $search_mode = $request->input('mode');
        if($search_mode == "author_id") 
        {
            $contacts = Contact::query()
                ->where('author_id', $query)
                ->paginate();
        }
    
        // Return the search view with the results compacted
        return view('contacts.search', compact('contacts'));
    }
}
