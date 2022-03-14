<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::whenSearch(Request()->search)->with('category')->paginate(5);

        return view('dashboard.meal.index', compact('meals'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('dashboard.meal.create', compact('categories'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'meal_description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);


        try {

            $data = $request->except('_token');


            Meal::create($data);

            session()->flash('success', 'Add Successfully');

            return redirect()->route('meal.index');

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
        $meal = Meal::find($id);
        $categories = Category::get();

        if($meal){
            return view('dashboard.meal.edit', compact('meal','categories'));
        }else{
            return redirect()->back()->with(['error'=>'no Meal']);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'meal_description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {

            $meal = Meal::find($id);

            $data = $request->except('_token');

            $meal->update($data);

            session()->flash('success', 'Update Successfully');

            return redirect()->route('meal.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }


    public function destroy($id)
    {
        try{
            $meal = Meal::find($id);

            if(!$meal)
            {
                return redirect()->back()->with(['error'=>'No Follows']);
            }

            $meal->delete();

            session()->flash('success', 'Deleted Successfully');

            return redirect()->route('meal.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }
}
