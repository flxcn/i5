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
            'client' => Client::find($client_id),
            'contact_types' => ContactType::where('is_active',true)->get(),
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
        $formFields = $request->validate([
            'contact_date' => 'required',
            'contact_type_id' => 'required',
            'contact_summary' => 'required'
        ]);

        $formFields['author_id'] = auth()->id();
        $formFields['client_id'] = $client_id;

        $contact = Contact::create($formFields);

        return redirect()->route('clients.show', $client_id)->with('message', 'Contact added successfully! ')->with('contact_id', $contact->id);
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
            'contact_types' => ContactType::where('is_active',true)->get(),
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
        $contact = Contact::find($contact->id);
        
        $formFields = $request->validate([
            'contact_date' => 'required',
            'contact_summary' => 'nullable',
            'contact_type_id' => 'required',
        ]);

        $contact->update($formFields);

        return redirect()->route('clients.show', $client_id)->with('message', 'Contact updated successfully!');

        // $contact->update($request->all());
        // return redirect()->route('contacts.index', $client_id);
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
        return redirect()->route('clients.contacts.index', ['client' => $client_id, 'contact' => $contact->id]);
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
