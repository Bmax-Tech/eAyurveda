 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class admin extends Controller
{
    //
	public function add_doctor(Request $request){
        // Add Doctors Detail
        regiser_doctors_table_dulan::create([
			'register_id' => $request->reg_id,
            'first_name' => $request->first_name,
           // 'last_name' => $request->last_name,
            'register_field' => $request->reg_field,
            'register_date' => $request->reg_date,
            'dob' => $request->dob,
            'gender' => $request->gender, 
            'nic' => $request->nic,
            'address' => $request->address,
			'contact_number' => $request->contact_number,
            'email' => $request->email,
            'current_working_place' => $request->current_working_place,
            'working_experience' => $request->working_experince, 
         // 'profile_image' => $request->email,
			'medical_procedure' => $request->medical_procedure,
            'treatment_period' => $request->treatment_period,
            'requirment' => $request->requirment, 
            'charges' => $request->charges,
            'type_of_medicine' => $request->medicine_type,
			'treatment_times' => $request->treatment_times,
            'carrier_period' => $request->carrier_period,
            'doctor_experince' => $request->doctor_experience, 
            'special_meditate' => $request->special_meditate,
           // 'reg_date' => new \DateTime(),
            
        ]);

        //return Redirect::away('/');
        return Redirect::to('/');
    }
	public function add_doctor_test(Request $request){
        // Add Doctors Detail
        doctors_table_test::create([
			'register_id' => $request->doc_reg_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            
           // 'reg_date' => new \DateTime(),
            
        ]);

        //return Redirect::away('/');
        return Redirect::to('/');
    }
	public function save_reg_doc(Request $request){
		dd($request);
	}
}
