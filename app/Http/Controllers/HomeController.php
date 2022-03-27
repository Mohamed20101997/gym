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

        return view('welcome',compact('products','classes'));
    }

    public function register(Request $request){

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
        $guard = \Auth::guard('client');
        $guard->logout();
        return redirect()->back();
    }


    public function check(Request $request){
        $serial_number = SerialNumber::where('serial_number' , $request->serial_number)->first();
        if($serial_number){
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

}
