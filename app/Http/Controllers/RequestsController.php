<?php

namespace App\Http\Controllers;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        #$softwares = Requests::all();
        #return view('pages.my_requests')->with('softwares',$softwares);
        if(Auth::user()&& Auth::user()->is_admin==0 && Auth::user()->role=="Academic"){
        $userId = Auth::user()->name;
        $softwares= Requests::where('Username',$userId)
                            ->where('Request_Stage','Submitted') ->get();
        //return view ('pages.my_requests')->with('softwares',$softwares);
 
        $rejected_software= Requests::where('Username',$userId)
                            ->where('Request_Stage','Rejected') ->get();
        
        $Accepted_software= Requests::where('Username',$userId)
                            ->where('Request_Stage','Accepted') ->get();
       $In_Progress= Requests::where('Username',$userId)
                            ->where('Request_Stage','In Progress') ->get();
        // return view ('pages.my_requests')->with('rejected_software',$rejected_software);
        return view ('pages.my_requests')->with('softwares',$softwares)->with('rejected_software',$rejected_software)
        ->with('Accepted_software',$Accepted_software)->with('In_Progress',$In_Progress);
        }
        else if(Auth::user()->is_admin==1){
        
            $rejected_software= Requests::where('Request_Stage','Rejected')->get();
            $submitted_software = Requests::where('Request_Stage','Submitted')->get();
            $in_Progress = Requests::where('Request_Stage','In Progress')->get();
            $accepted_software = Requests::where('Request_Stage','Accepted')->get();
            
            $softwares = Requests::all();
            return view('pages.admin')->with('softwares',$softwares)->with('rejected_software',$rejected_software)
            ->with('in_Progress',$in_Progress)->with('submitted_software',$submitted_software)->with('accepted_software',$accepted_software);
            
        }
        else if(Auth::user()->role=="System Admin"){
            $usercount = User::where('verified','0');
            return view('pages.admin')->with('usercount',$usercount);
    
        }
        

        #LOOK AT THIS CODE
        
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
        
        
        $user = Auth::user()->id;
        $this->validate($request,[
            'Software_Name'=> 'required',
            'Software_Version'=>'required',
            'Software_Link'=>'required',
            'OS' =>'required',
            'cost' => 'required',
            'Software_Cost' => 'required|numeric',
            'Software_Reason'=> 'required',
            'Module_Code'=>'required'
           
        
        ]);

        $requests = new Requests;
        $requests->Username = auth()->user()->name;
        $requests->Software_Name = $request->input('Software_Name');
        $requests->Software_Reason = $request->input('Software_Reason');
        $requests->OS = $request->input('OS');
        $requests->Software_Version = $request->input('Software_Version');
        $requests->Software_Link = $request->input('Software_Link');
        $requests['category'] = $request->input('cost');
        $requests->Software_Cost = $request->input('Software_Cost');
        $requests->Department_Paying = $request->input('Department_Paying');
        $requests->Module_Code = $request->input('Module_Code');
        $requests->DS_Notes = $request->input('DS_Notes');
        $requests->Request_stage = 'Submitted';
        
    
        $requests->save();
        //return 123;
        return redirect('/home')->with('success', 'Request made');
     
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
        $software = Requests::find($id);
        return view('pages.Edit_request')->with('software',$software);

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
        $this->validate($request,[
            'Software_Name'=> 'required',
            'Software_Reason'=> 'required'
        ]);

        $software = Requests::find($id);
        $software->Software_Name = $request->input('Software_Name');
        $software->Software_Reason = $request->input('Software_Reason');
        $software->OS = $request->input('OS');
        $software->Software_Version = $request->input('Software_Version');
        $software->Software_Link = $request->input('Software_Link');
        $software->Software_Cost = $request->input('Software_Cost');
        $software->Department_Paying = $request->input('Department_Paying');
        $software->Module_Code = $request->input('Module_Code');
        $software['category'] = $request->input('cost');
        $software->save();
        //return 123;

        return redirect('/my_requests')->with('success', 'Request Updated');
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
        $software = Requests::find($id);
        $software-> delete();
        return redirect('/my_requests')->with('success', 'Request Deleted');
    }
}
