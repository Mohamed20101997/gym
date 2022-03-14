<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\FollowUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowUpController extends Controller
{
    public function index()
    {
        $followUps = FollowUp::whenSearch(Request()->search)->with('category')->paginate(5);

        return view('dashboard.followUp.index', compact('followUps'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('dashboard.followUp.create', compact('categories'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);


        try {

            $data = $request->except('_token');



            FollowUp::create($data);

            session()->flash('success', 'Add Successfully');

            return redirect()->route('followUp.index');

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
        $followUp = FollowUp::find($id);
        $categories = Category::get();

        if($followUp){
            return view('dashboard.followUp.edit', compact('followUp','categories'));
        }else{
            return redirect()->back()->with(['error'=>'no FollowUp']);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {

            $followUp = FollowUp::find($id);

            $data = $request->except('_token');

            $followUp->update($data);

            session()->flash('success', 'Update Successfully');

            return redirect()->route('followUp.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }


    public function destroy($id)
    {
        try{
            $followUp = FollowUp::find($id);

            if(!$followUp)
            {
                return redirect()->back()->with(['error'=>'No Follows']);
            }

            $followUp->delete();

            session()->flash('success', 'Deleted Successfully');

            return redirect()->route('followUp.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }
}
