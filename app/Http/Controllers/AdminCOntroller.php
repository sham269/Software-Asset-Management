<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use Auth;

class AdminCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softwares = Requests::all();
        return view('Admin_Pages.All_Requests')->with('softwares',$softwares);
            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        //
        
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
        //
        if(isset($_POST["submit"])){
            $sub=$_POST["submit"];

            if(isset($sub["Inprogress"])){
                 $software = Requests::find($id);
                // $software->Request_Stage= $request->input('In Progress');
                // $software->save();
                
                $software->Request_Stage='In Progress';
                $software->save();
                return redirect('/Admin/AllRequest')->with('success', 'Request Updated');
            }
            if(isset($sub["Reject"])){
                $software = Requests::find($id);
                // $software->Request_Stage= $request->input('In Progress');
                // $software->save();
                
                $software->Request_Stage='Rejected';
                $software->save();
                return redirect('/Admin/AllRequest')->with('success', 'Request Updated');
            
            }
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
        //
    }
}
