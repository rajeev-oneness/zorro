<?php

namespace App\Http\Controllers;

use App\Model\Area;
use Illuminate\Http\Request;
use App\Model\Driver;
use App\Model\JobTiming;
use App\Model\Vehicle;
use App\Model\Booking;
use App\Model\DriverLiveLocation;
use Validator,Redirect,Response;

class DriverController extends Controller
{
     /**
    * Go to Add Vehicle Types.
    *
    * @return view
    */
    public function driverView(){
        $categories = Vehicle::all();
        $categories1 = JobTiming::all();
        $categories2 = Area::all();
        return view('/drivers.add_drivers', compact('categories', 'categories1', 'categories2'));
    }

      /**
    * Go to Add Offers.
    *
    * @return view
    */
    public function addDriver(Request $request) {

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',  
            'mobile' => 'required',
            'dob' => 'required',  
            'address' => 'required',
            'image' => 'required',  
            'landmark' => 'required',
            'vehicle_name' => 'required',  
            'pan_no' => 'required:max:10',
            'aadhar' => 'required|max:12',         
        ]);
       $validator->validate();

       $fileName1 = time().'.'.$request->file('image')->extension(); 
            $request->file('image')->move(public_path('uploads/'), $fileName1);
            $imgupdate ='uploads/'.$fileName1;

            $fileName = time().'.'.$request->file('license_image')->extension(); 
                    // echo json_encode($fileName);die;

            $request->file('license_image')->move(public_path('uploads/'), $fileName);
            $imgupdate1 ='uploads/'.$fileName;

       $password = \Hash::make($request->password);

       $dob = $request->dob;
       $timestamp = strtotime($dob);
       $new_date = date("Y-m-d", $timestamp);

       $length = 6;

       $otp = substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 2, $length);

       $is_verified = 1;

        $Driver = new Driver();
        $Driver->fname = $request->fname;  
        $Driver->lname = $request->lname;
        $Driver->email = $request->email;  
        $Driver->password = $password;
        $Driver->mobile = $request->mobile;  
        $Driver->whatsapp_no = $request->whatsapp_no;
        $Driver->dob = $new_date;  
        $Driver->image = $imgupdate;
        $Driver->address = $request->address;  
        $Driver->landmark = $request->landmark;
        $Driver->gender = $request->gender;  
        $Driver->vehicle_type = $request->vehicle_type;
        $Driver->license_image = $imgupdate1;  
        $Driver->vehicle_name = $request->vehicle_name;
        $Driver->vehicle_no = $request->vehicle_no;  
        $Driver->emergency_contact_name = $request->emergency_contact_name;          
        $Driver->emergency_contact_no = $request->emergency_contact_no;  
        $Driver->relation = $request->relation;
        $Driver->preferred_job_timing_id = $request->preferred_job_timing_id;  
        $Driver->preferred_area_id = $request->preferred_area_id;
        $Driver->pan_no = $request->pan_no;  
        $Driver->aadhar = $request->aadhar;
        $Driver->driver_license = $request->driver_license;  
        $Driver->bank_account_no = $request->bank_account_no;
        $Driver->ifsc_code = $request->ifsc_code;  
        $Driver->otp = $otp;
        $Driver->is_verified = $is_verified;  

    
        $Driver->save();
           
            return redirect()->route('admin.manage_drivers');
    }

     /**
     * Go to manage events view.
     *
     * @param  Request $request
     * @return view
     */
    public function manageDriversView(Request $request){
        $drivers = Driver::
        when($request->name, function($query) use ($request){
            $query->where('fname', 'LIKE', '%'.$request->name.'%')->orWhere('lname', 'LIKE', '%'.$request->name.'%');
        })
        ->when($request->mobile, function($query) use ($request){
            $query->where('mobile', 'LIKE', '%'.$request->mobile.'$');
        })
        ->when($request->address, function($query) use ($request){
            $query->where('address', 'LIKE', '%'.$request->address.'%');
        })
        ->when($request->pan_no, function($query) use ($request){
            $query->where('pan_no', 'LIKE', '%'.$request->pan_no.'%');
        })
        ->get();
        $active = Driver::where('is_active', 1)->where('is_blocked', 0)->get()->pluck('id');
        $inactive = Driver::where('is_active', 0)->where('is_blocked', 0)->get()->pluck('id');
        $blocked = Driver::where('is_blocked', 1)->get()->pluck('id');
        return view('/drivers.manage_drivers',compact('drivers', 'active', 'inactive', 'blocked'));
    }

      /**
     * Go to Edit VehicletType 
     *
     * @param  Request $request
     * @return view
     */
//     public function editDriver(Request $request) {      
//         $lead_events_id = $request->app_id;
//         $categoriesveh = Vehicle::all();
//         $categoriesjob = JobTiming::all();
//         $categoriesarea = Area::all();
//         $editedoffers_data = Driver::where('id', $lead_events_id)->first();
//         // echo json_encode($businessSerData);die;
//         return view('/drivers.edit_driver', compact('editedoffers_data', 'categoriesveh', 'categoriesjob', 'categoriesarea'));
        
//     }


     /**
     * Go to Edit VehicletType 
     *
     * @param  Request $request
     * @return view
     */
    public function editDriver(Request $req)
    {
        $categoriesveh = Vehicle::all();
        $categoriesjob = JobTiming::all();
        $categoriesarea = Area::all();
        $editedoffers_data = Driver::findOrFail(base64_decode($req->id));
        return view('/drivers.edit_driver', compact('editedoffers_data', 'categoriesveh', 'categoriesjob', 'categoriesarea'));
    }

    /**
    * Go to Update Offers.
    *
    * @return view
    */
    public function updateDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'string',
            'lname' => 'string',
            'email' => 'email',
            'mobile' => 'digits:10|numeric',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',  
            'landmark' => 'string',
            'vehicle_name' => 'string',  
            'pan_no' => 'max:10',
            'aadhar' => 'max:12',         
        ]);
        $validator->validate();

        $hid_id = $request->hid_id;
        $dob = $request->dob;
        $timestamp = strtotime($dob);
        $new_date = date("Y-m-d", $timestamp);

        // $length = 6;
        // $otp = substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 2, $length);

        $otp = 1234;
        $driver_data = Driver::find( $hid_id);
        // dd($driver_data);
        $driver_data->fname = $request->fname; 
        $driver_data->lname = $request->lname; 
        $driver_data->email = $request->email; 
        if($request->password != ''){
            $password = \Hash::make($request->password);
            $driver_data->password = $password; 
        }
        $driver_data->mobile = $request->mobile; 
        $driver_data->whatsapp_no = $request->whatsapp_no; 
        $driver_data->dob = $new_date; 

        if ($request->hasFile('image')) {
            $fileName1 = time().'.'.$request->file('image')->getClientOriginalExtension(); 
            $request->file('image')->move(public_path('uploads/'), $fileName1);
            $imgupdate ='uploads/'.$fileName1;
            $driver_data->image = $imgupdate; 
        }

        $driver_data->address = $request->address; 
        $driver_data->landmark = $request->landmark; 
        $driver_data->gender = $request->gender; 
        $driver_data->vehicle_type = $request->vehicle_type;

        if ($request->hasFile('license_image')) {
            $fileName = time().'.'.$request->file('license_image')->getClientOriginalExtension();
            $request->file('license_image')->move(public_path('uploads/'), $fileName);
            $imgupdate1 ='uploads/'.$fileName;
            $driver_data->license_image = $imgupdate1; 
        } 

        $driver_data->vehicle_name = $request->vehicle_name; 
        $driver_data->vehicle_no = $request->vehicle_no; 
        $driver_data->emergency_contact_name = $request->emergency_contact_name;
        $driver_data->emergency_contact_no = $request->emergency_contact_no; 
        $driver_data->relation = $request->relation; 
        $driver_data->preferred_job_timing_id = $request->preferred_job_timing_id; 
        $driver_data->preferred_area_id = $request->preferred_area_id; 
        $driver_data->pan_no = $request->pan_no; 
        $driver_data->aadhar = $request->aadhar; 
        $driver_data->driver_license = $request->driver_license; 
        $driver_data->bank_account_no = $request->bank_account_no; 
        $driver_data->ifsc_code = $request->ifsc_code; 
        $driver_data->otp = $otp; 
        $driver_data->is_verified = 1;
        $driver_data->save();
    
        return redirect()->route('admin.manage_drivers');
    }

     /**
     * Go to Delete Offers.
     *
     * @param  Request $request
     * @return view
     */
    public function deleteDriver(Request $request) {
        $lead_delete_id = $request->appdel_id;
        $delete_event = Driver::where('id', $lead_delete_id)->delete();
        return redirect()->route('admin.manage_drivers');
    }
    
    public function getRiderByName(Request $req)
    {
        $req->validate([
            '_token'=> 'required',
            'riderName'=> 'required|string',
        ]);
        $driver = Driver::where('fname', 'like', '%'.$req->riderName.'%')->orWhere('lname', 'like', '%'.$req->riderName.'%')->get();
        return response()->json(['error' => false, 'message' => 'rider data', 'data' => $driver]);
    }

    public function getMonthDates(Request $req)
    {
        // $req->validate([
        //     '_token'=> 'required',
        //     'riderName'=> 'required|string',
        // ]);
        $start_date = date('Y-m-d', strtotime($req->startDate));
        $end_date = date('Y-m-d', strtotime($req->endDate));
        $drivers = Booking::where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->pluck('driver_id')->toArray();
        $drivers = array_unique($drivers);
        $rider = Driver::whereIn('id',$drivers)->get();
        return response()->json(['error' => false, 'message' => 'calendar', 'data' => $rider]);
    }

    public function changeStatus(Request $req)
    {
        // dd($req->all());
        $driver = driver::find(base64_decode($req->driverId));
        if($req->driverStatus == 0) {
            $status = [1, 0];
        } elseif($req->driverStatus == 1) {
            $status = [0, 0];
        } elseif($req->driverStatus == 2) {
            $status = [0, 1];
        }
        $driver->is_active = $status[0];
        $driver->is_blocked = $status[1];
        $driver->save();
        return redirect()->route('admin.manage_drivers');
    }

    public function getDriverLocation(Request $req)
    {
        $location = Driver::where('is_active', 1)->where('is_blocked', 0)->with('liveLocation')->get();
        return response()->json(['error' => false, 'message' => 'live location', 'data' => $location]);
    }
}
