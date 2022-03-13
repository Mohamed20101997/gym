<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
            'name' => 'required',
        ]);

        try {

            $data = $request->except('_token');


            Category::create($data);

            session()->flash('success', 'Add Successfully');

            return redirect()->route('category.index');

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
        $category = Category::find($id);

        if($category){
            return view('dashboard.category.edit', compact('category'));
        }else{
            return redirect()->back()->with(['error'=>'no Category']);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $category = Category::find($id);

            $data = $request->except('_token');


            $category->update($data);

            session()->flash('success', 'Update Successfully');

            return redirect()->route('category.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }


    public function destroy($id)
    {
        try{
            $category = Category::find($id);

            if(!$category)
            {
                return redirect()->back()->with(['error'=>'No Categories']);
            }

            $category->delete();

            session()->flash('success', 'Deleted Successfully');

            return redirect()->route('category.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }
}
