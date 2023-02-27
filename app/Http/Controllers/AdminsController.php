<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEdit;
use App\Http\Requests\AdminnStore;
use App\Http\Requests\AdminsUpdate;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admins'] = Admins::all();
        return view('admins.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminnStore $request)
    {
        $inputs = $request->except('_token');
        Admins::create($inputs);
        return redirect()->back()->with('success','done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin'] = Admins::find($id);
        session()->flash('id',$id);
        return view('admins.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(AdminsUpdate $request, Admins $admins)
    {
        $inputs = $request->except('_token','password');
        Admins::find(session()->get('id'))->update($inputs);
        if ($request->password !=null) {
            $validate = [
                'password'=>['required','min:8','confirmed']
            ];
            $request->validate($validate);
            Admins::find(session()->get('id'))->update([
                'password'=>Hash::make($request->password)
            ]);
        }
        return redirect()->back()->with('success','done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Admins::find($request['id'])->delete();
        return redirect()->back()->with('success','done');
    }
}
