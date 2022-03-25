<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create');
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
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'description' => 'required',
            'price' => 'required',
        ]);

        try {

            $data = $request->except('_token');

            if ($request->has('image')) {
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            Product::create($data);

            session()->flash('success', 'Add Successfully');

            return redirect()->route('product.index');

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
        $product = Product::find($id);

        if($product){
            return view('dashboard.product.edit', compact('product'));
        }else{
            return redirect()->back()->with(['error'=>'no Product']);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'description' => 'required',
            'price' => 'required',
        ]);

        try {
            $product = Product::find($id);

            $data = $request->except('_token');

            if ($request->has('image')) {

                remove_previous($product->image);
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            $product->update($data);

            session()->flash('success', 'Update Successfully');

            return redirect()->route('product.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There is a problem']);
        }

    }


    public function destroy($id)
    {
        try{
            $product = Product::find($id);

            if(!$product)
            {
                return redirect()->back()->with(['error'=>'No Products']);
            }

            remove_previous($product->image);

            $product->delete();

            session()->flash('success', 'Deleted Successfully');

            return redirect()->route('product.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }
}
