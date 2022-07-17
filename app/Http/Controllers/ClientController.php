<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CaseType;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ReferralSource;

class ClientController extends Controller
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
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => ['required_without_all:phone_number','nullable', 'unique:clients','email'],
            'phone_number' => ['required_without_all:email','nullable','unique:clients'],
            'address_line_1' => 'nullable',
            'address_line_2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'postal_code' => 'nullable',
            'country' => 'nullable',
        ]);

        $formFields['author_id'] = auth()->id();
        $formFields['case_type_id'] = 21;
        $formFields['category_id'] = 1;
        $formFields['referral_source_id'] = 1;

        $client = Client::create($formFields);

        return redirect('/clients')->with('message', 'Client added successfully! ')->with('client_id', $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show($id)
    {
        return view('clients.show', [
            'client' => Client::find($id),
            'contacts' => Client::find($id)->contacts,
            'categories' => Category::all(),
            'case_types' => CaseType::where('is_active',true)->get(),
            'referral_sources' => ReferralSource::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clients.edit', [
            'client' => Client::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        
        $formFields = $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => ['required_without_all:phone_number','nullable','email'],
            'phone_number' => ['required_without_all:email','nullable'],
            'language' => 'required',
            'address_line_1' => 'nullable',
            'address_line_2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'postal_code' => 'nullable',
            'country' => 'nullable',

            'category_id' => 'required',
            'case_type_id' => 'required',
            'referral_source_id' => 'required'
        ]);

        $client->update($formFields);

        return back()->with('message', 'Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/clients')->with('message', 'Client deleted successfully');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $query = $request->input('q');
        $search_mode = $request->input('mode');
        if($search_mode == "name") 
        {
            $clients = Client::query()
                ->whereRaw('concat(first_name," ",last_name, ", ",first_name) LIKE ?', "%{$query}%")
                ->paginate();
        }
        else if($search_mode == "email")
        {
            $clients = Client::query()
                ->where('email', 'LIKE', "%{$query}%")
                ->paginate();
        }
        else if($search_mode == "phone")
        {
            $clients = Client::query()
                ->where('phone_number', 'LIKE', "%{$query}%")
                ->paginate();
        }
        else if($search_mode == "author_id")
        {
            $clients = Client::query()
                ->where('author_id', $query)
                ->paginate();
        }
        else {
            $clients = Client::query()
                ->whereRaw('concat(first_name," ",last_name, ", ",first_name) LIKE ?', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('phone_number', 'LIKE', "%{$query}%")
                ->paginate();
        }
        
    
        // Return the search view with the results compacted
        return view('clients.search', compact('clients'));
    }
}
