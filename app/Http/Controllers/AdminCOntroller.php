<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\User;
use App\Models\Post;
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
        $rejected_software= Requests::where('Request_Stage','Rejected')->get();
        return view('Admin_Pages.Rejected_Requests')->with('rejected_software',$rejected_software);

    }
    public function RejectedPage(){
        $rejected_software= Requests::where('Request_Stage','Rejected')->get();
        return view('Admin_Pages.Rejected_Requests')->with('rejected_software',$rejected_software);
    }
    
    
    public function AcceptedPage(){
        $Accepted_software= Requests::where('Request_Stage','Accepted')->get();
        return view('Admin_Pages.Accepted_Requests')->with('Accepted_software',$Accepted_software);
    }
    public function SubmittedPage(){
        $Submitted_software= Requests::where('Request_Stage','Submitted')->get();
        return view('Admin_Pages.Submitted')->with('Submitted_software',$Submitted_software);
    }
    public function InProgressPage(){
        $InProgress_software= Requests::where('Request_Stage','In Progress')->get();
        return view('Admin_Pages.InProgress')->with('In_Progress_software',$InProgress_software);
    }
    public function VerifyPage(){
        $verified= User::where('verified',0)->get();
        return view('Admin_Pages.verificiation')->with('verified',$verified);
    }
    public function UserPage(){
        $Users = User::all()->except(Auth::id());
        return view('Admin_Pages.User')->with('Users',$Users);
    }
    public function SoftwarePage(){
        $software = Post::all();
        return view('Admin_Pages.software_directory')->with('software',$software);
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UserUpdate(Request $request,$id){
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required',
            'is_admin'=>'required',
            'role'=>'required'
        ]);
        $user = User::find($id);
        $user->name= $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->role = $request->input('role');
        $user->save();
        //return 123;

        return redirect('/admin')->with('success', 'User Updated');
    }
    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, $id)
    {
         //
         if(isset($_POST["submit"])){
            $sub=$_POST["submit"];

            if(isset($sub["Accept"])){
                 $software = User::find($id);
                // $software->Request_Stage= $request->input('In Progress');
                // $software->save();
                
                $software->verified='1';
                $software->save();
                return redirect('/admin')->with('success', 'User Accepted');
            }
            if(isset($sub["Deny"])){
                $software = User::find($id);
                // $software->Request_Stage= $request->input('In Progress');
                // $software->save();
                $software->notes = $request->input('notes');
                $software->verified='2';
                $software->save();
                return redirect('/admin')->with('success', 'User Rejected');
            
            }
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
        //
        if(isset($_POST["submit"])){
            $sub=$_POST["submit"];

            if(isset($sub["Inprogress"])){
                 $software = Requests::find($id);
                // $software->Request_Stage= $request->input('In Progress');
                // $software->save();
                
                $software->Request_Stage='In Progress';
                $software->save();
                return redirect('/admin')->with('success', 'Request Put in Progress');
            }
            if(isset($sub["Reject"])){
                $software = Requests::find($id);
                // $software->Request_Stage= $request->input('In Progress');
                // $software->save();
                $software->DS_Notes = $request->input('DS_Notes');
                $software->Request_Stage='Rejected';
                $software->save();
                return redirect('/admin')->with('success', 'Request Rejected');
            
            }
            if(isset($sub["Accept"])){
                $software = Requests::find($id);
                // $software->Request_Stage= $request->input('In Progress');
                // $software->save();
                
                $software->Request_Stage='Accepted';
                $software->save();
                return redirect('/admin')->with('success', 'Request Accepted');
            
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
        $user = User::find($id);
        $user-> delete();
        return redirect('/admin/User')->with('success', 'Request Deleted');
    }
}
