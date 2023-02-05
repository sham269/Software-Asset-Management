<?php

namespace App\Http\Controllers;
use App\Http\Controllers\User;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index(){
        $PageTitle = 'Software Asset Management!';
        // return view ('pages.index',compact('PageTitle'));
        return view ('pages.index')->with('PageTitle',$PageTitle);
    }
    public function about(){
        $PageTitle = 'About';
        return view ('pages.about')->with('PageTitle',$PageTitle);
    }
    public function services(){
        $data = array(
            'PageTitle'=>'Software Listed',
            'services'=>['Base Software','Midtier Software','Prime software']
        );
        return view ('pages.services')->with($data);
    }
    public function admin(){


        $PageTitle = 'Admin Console';
        return view ('pages.admin')->with('PageTitle',$PageTitle);
    }
    public function request(){

        $PageTitle = 'Request Software';
        return view ('pages.request')->with('PageTitle',$PageTitle);
    }
 
    public function room(){

        $PageTitle = 'Rooms with Software';
        return view ('pages.RoomList')->with('PageTitle',$PageTitle);
    }
    // public function my_requests(){
    //     $PageTitle = 'My requests';
    //     return view ('pages.my_requests')->with('PageTitle',$PageTitle);
    // }
}
