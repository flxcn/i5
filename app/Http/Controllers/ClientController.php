<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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

            // 'clients' => Client::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'client' => Client::find($id)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function search()
    // {
    //     $clients = DB::table('clients')
    //             ->where('first_name', 'like', '%{$search}%')
    //             ->get();
    // }

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
        else {
            $clients = Client::query()
                ->whereRaw('concat(first_name," ",last_name, ", ",first_name) LIKE ?', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('phone_number', 'LIKE', "%{$query}%")
                ->paginate();
        };
        
    
        // Return the search view with the results compacted
        return view('clients.search', compact('clients'));
    }
}
