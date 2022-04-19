<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Client;
use App\FollowUp;
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
        $categories = Category::get();
        return view('dashboard.client.create', compact('categories'));
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
            'image' => 'mimes:jpeg,jpg,png,gif',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'category_id' => 'required',
            'follow_up_id' => 'required',
        ]);

        try {

            $data = $request->except('_token','password_confirmation');

            if ($request->has('image')) {
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
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
        $categories = Category::get();
        if($client){
            return view('dashboard.client.edit', compact('client','categories'));
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
            'image' => 'mimes:jpeg,jpg,png,gif',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'category_id' => 'required',
            'follow_up_id' => 'required',
        ]);

        try {
            $client = Client::find($id);

            $data = $request->except('_token','password_confirmation');

            if ($request->has('image')) {

                remove_previous($client->image);
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
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

    public function get_follow_up(Request $request){
        $followUps = FollowUp::where('category_id', $request->category_id)->get();
        $followUp_id = $request->follow_up_id;
        $html = view('dashboard.client.follow_up_options' , compact('followUps','followUp_id'))->render();

       return response()->json($html);
    }
}
