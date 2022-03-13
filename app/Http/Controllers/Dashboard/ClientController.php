<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:clients,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
            'image' => 'image',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
        ]);

        try {

            $data = $request->except('_token','password_confirmation');

            if ($request->has('image')) {
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            Client::create($data);

            session()->flash('success', 'Add Successfully');

            return redirect()->route('client.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $client = Client::find($id);

        if($client){
            return view('dashboard.client.edit', compact('client'));
        }else{
            return redirect()->back()->with(['error'=>'no Client']);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:clients,email,'.$id,
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'sometimes|confirmed',
            'image' => 'image',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
        ]);

        try {
            $client = Client::find($id);

            $data = $request->except('_token','password_confirmation');

            if ($request->has('image')) {

                remove_previous($client->image);
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            $client->update($data);

            session()->flash('success', 'Update Successfully');

            return redirect()->route('client.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }


    public function destroy($id)
    {
            try{
                $client = Client::find($id);

                if(!$client)
                {
                    return redirect()->back()->with(['error'=>'No Clients']);
                }

                remove_previous($client->image);

                $client->delete();

                session()->flash('success', 'Deleted Successfully');

                return redirect()->route('client.index');

            }catch(\Exception $e){

                return redirect()->back()->with(['error'=>'There is a problem']);
            }
    }
}
