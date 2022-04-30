<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Exercise;
use App\FollowUp;
use App\Meal;
use App\Product;
use App\SerialNumber;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::get();

         $classes = Category::with('followUp')->get();

        if(auth()->guard('client')->check()){
            $client = auth()->guard('client')->user();

            $classes = Category::where('id',$client->category_id)->with(['followUp'=> function($q) use($client){
                return $q->where('id', $client->follow_up_id);
            }])->get();
        }



        return view('welcome',compact('products','classes'));
    }

    public function register(Request $request){

        $request->validate([
            'email' => 'required|email|unique:clients,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'gender' => 'required',
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

            session()->flash('success', 'Created account Successfully Go To login');

            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }

    public function login(Request $request){

        if(auth()->guard('client')->attempt(['email'=> $request->input("email") ,'password' =>  $request->input("password")  ]))
        {
            return redirect()->route('home');
        }
        return \Redirect::back()->withErrors(['msg' => 'Email or Password does not correct']);

    }

    public function logout(){
        try {
            $guard = \Auth::guard('client');
            $guard->logout();
            return redirect()->route('home');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }
    }


    public function check(Request $request){
        $serial_number = SerialNumber::where('serial_number' , $request->serial_number)->first();
        if($serial_number){
            $client = Client::find(auth()->guard('client')->user()->id);
            $client->update([
                'checked' => 1
            ]);
            $serial_number->save();
            return response()->json('ok');
        }else{
            return response()->json('error');
        }
    }

    public function exercise($follow_id, $category_id){
        $exercise = Exercise::where('follow_up_id' , $follow_id)->get();
        $meals = Meal::where('category_id' , $category_id)->get();

        $followUp = FollowUp::find($follow_id);
        $category = Category::find($category_id);

        return view('exercise' , compact('exercise' ,'meals' ,'followUp' ,'category'));

    }


    public function profile(){
        $client = Client::where('id',auth()->guard('client')->user()->id)->with('category' ,'followUp')->first();
        $categories = Category::get();
        return view('profile' , compact('client','categories'));
    }

    public function updateProfile(Request $request , $id){

        $request->validate([
            'email' => 'required|email|unique:clients,email,'.$id,
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'sometimes|confirmed',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'phone' => 'required',
            'gender' => 'required',
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

            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }

    public function get_follow_up(Request $request){
        $followUps = FollowUp::where('category_id', $request->category_id)->get();
        $followUp_id = $request->follow_up_id;
        $html = view('dashboard.client.follow_up_options' , compact('followUps','followUp_id'))->render();

        return response()->json($html);
    }

}
