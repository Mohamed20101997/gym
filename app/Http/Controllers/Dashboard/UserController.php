<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->search != null ? $paginate = 1 : $paginate = 5;

        $users = User::where(function($q) use ($request){

            return $q->when($request->search , function($query) use ($request){

                return $query->where('first_name','like','%' . $request->search . '%')
                        ->orWhere('last_name','like','%' . $request->search . '%');

            });

        })->latest()->paginate($paginate); //get user and make a search;
        return view('dashboard.users.index',compact('users'));

    } //end of index


    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name' =>'required',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|min:5|confirmed',
            'permissions'  => 'required|min:1',
            'image'         =>  'image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->except(['password','password_confirmation','permissions','image']);
        $data['password'] =bcrypt($request->password);

        if($request->image)
        {
            \Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/user_images/'. $request->image->hashName()));

            $data['image'] = $request->image->hashName();
        }


         User::create($data);


        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.users.index');

    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name' =>'required',
            'email'     =>'required|email|unique:users,id',
            'permissions'  => 'required|min:1',
            'image'         =>  'image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->except(['permissions','image']);

        if($request->image)
        {
            if($user->image != 'default.png')
            {
                Storage::disk('public_uploads')->delete('/user_images/' . $user->image );
            }
            \Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/user_images/'. $request->image->hashName()));

            $data['image'] = $request->image->hashName();
        }

        $user->update($data);

        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        if($user->image != 'default.png')
        {
            Storage::disk('public_uploads')->delete('/user_images/' . $user->image );
        }
        $user->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return back();

    }
}
