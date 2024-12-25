<?php

namespace App\Http\Controllers;

use App\Models\HomeAppointment;
use App\Models\UserInvestigation;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        $users = User::with('homeAppointments', 'mytests.investigation')->get();

        return view('appointments.index', compact('users'));
    }

    public function create(){
        return view('make appointment');
    }
    public function store(Request $request){
        $info=new HomeAppointment;
        $info->first_name = $request->input('first_name');
        $info->last_name = $request->input('last_name');
        $info->email = $request->input('email');
        $info->phone_number = $request->input('phone_number');
        $info->gender=$request->input('gender');
        $info->address=$request->input('address');
        $info->date= $request->input('date');
        $info->time= $request->input('time');
        
        
      $info->save();
    return view('make appointment');
    }

}
