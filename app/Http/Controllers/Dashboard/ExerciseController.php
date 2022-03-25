<?php

namespace App\Http\Controllers\Dashboard;

use App\Exercise;
use App\FollowUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
      public function index()
    {
        $exercises = Exercise::whenSearch(Request()->search)->with('follow_up')->paginate(5);

        return view('dashboard.exercise.index', compact('exercises'));
    }


    public function create()
    {
        $followUps = FollowUp::get();
        return view('dashboard.exercise.create', compact('followUps'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required|mimes:jpeg,jpg,png,gif',
            'follow_up_id' => 'required|exists:follow_ups,id',
        ]);


        try {

            $data = $request->except('_token');

            if ($request->has('photo')) {
                $data['photo'] = uploadImage('public_uploads', $request->file('photo'));
            }
            Exercise::create($data);

            session()->flash('success', 'Add Successfully');

            return redirect()->route('exercise.index');

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
        $exercise = Exercise::find($id);
        $followUps = FollowUp::get();

        if($exercise){
            return view('dashboard.exercise.edit', compact('exercise','followUps'));
        }else{
            return redirect()->back()->with(['error'=>'no Exercise']);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif',
            'follow_up_id' => 'required|exists:follow_ups,id',
        ]);

        try {

            $exercise = Exercise::find($id);

            $data = $request->except('_token');


            if ($request->has('photo')) {

                remove_previous($exercise->photo);
                $data['photo'] = uploadImage('public_uploads', $request->file('photo'));
            }

            $exercise->update($data);

            session()->flash('success', 'Update Successfully');

            return redirect()->route('exercise.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }


    public function destroy($id)
    {
        try{
            $exercise = Exercise::find($id);

            if(!$exercise)
            {
                return redirect()->back()->with(['error'=>'No Follows']);
            }

            remove_previous($exercise->photo);

            $exercise->delete();

            session()->flash('success', 'Deleted Successfully');

            return redirect()->route('exercise.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }
}
