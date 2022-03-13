<?php

namespace App\Http\Controllers\Dashboard;

use App\SerialNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerialNumberController extends Controller
{

    public function index()
    {
        $serialNumbers = SerialNumber::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.serial_number.index', compact('serialNumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.serial_number.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_number'   => 'required|unique:serial_numbers,serial_number',
        ]);

        try{
            if (!$request->has('state'))
                $request->request->add(['state' => 0]);
            else
                $request->request->add(['state' => 1]);

            $data = $request->except('_token');


            SerialNumber::create($data);

            session()->flash('success', 'Add Successfully');

            return redirect()->route('serialNumber.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serial = SerialNumber::find($id);

        if($serial){
            return view('dashboard.serial_number.edit', compact('serial'));
        }else{
            return redirect()->back()->with(['error'=>'no serial number']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_number'   => 'required|unique:serial_numbers,serial_number,'.$id,
        ]);

        try{
            $serial = SerialNumber::find($id);

            if (!$request->has('state'))
                $request->request->add(['state' => 0]);
            else
                $request->request->add(['state' => 1]);

            $data = $request->except('_token');


            $serial->update($data);

            session()->flash('success', 'Update Successfully');

            return redirect()->route('serialNumber.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $serial = SerialNumber::find($id);

            if(!$serial)
            {
                return redirect()->back()->with(['error'=>'no serial number']);
            }

            $serial->delete();

            session()->flash('success', 'Deleted Successfully');

            return redirect()->route('serialNumber.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
    }
}
