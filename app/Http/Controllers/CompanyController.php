<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        $company=User::where('user_type','3')->orderby('id','desc')->get();
        return view('company/company_index' , compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/company_create');
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
            'company_name' => ['required'],
            
        ]);
        // 'street_address' => ['required'],
        //     'city' => ['required'],
        //     'state' => ['required'],
        //     'zip_code' => ['required'],
        //     'country' => ['required'],
        $data = User::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'street_address' => $request->street_address,
            'user_type'=>'3',
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'password'=> Hash::make($request->password),
            'password_show'=> $request->password,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        $data->attachRole('3');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(User $company)
    {
        $userId=$company->id;
        $users = User::where('parent_id',$userId)->get();
        return view('company/company_show',compact('company','users'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $company=User::find($id);
        return view('company/company_edit',compact('company'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'company_name' => ['required'],
          
        ]);
        // 'street_address' => ['required'],
        // 'city' => ['required'],
        // 'state' => ['required'],
        // 'zip_code' => ['required'],
        // 'country' => ['required'],
        $company=User::find($id);
        if(isset($request->password))
        {
            $company['password']=Hash::make($request->password);
            $company['password_show']=$request->password;
        }
        $company['company_name']=$request->company_name;
        $company['email']=$request->email;
        $company['street_address']=$request->street_address;
        $company['city']=$request->city;
        $company['state']=$request->state;
        $company['zip_code']=$request->zip_code;
        $company['country']=$request->country;
        $company['updated_at']=date("Y-m-d h:i:s");
        $company['updated_by']=Auth::user()->id;
        $company->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
}
