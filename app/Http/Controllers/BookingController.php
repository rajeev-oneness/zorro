<?php

namespace App\Http\Controllers;

use App\Model\Booking;
use App\Model\Driver;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Validator, Redirect, Response;


class BookingController extends Controller
{
    /**
     * Go to Bookin View.
     *
     * @return view
     */
    public function bookingView()
    {
        $driver = Driver::all();

        return view('/booking.booking', compact('driver'));
    }

    /**
     * Go to Add Offers.
     *
     * @return view
     */
    public function addBooking(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'from_location' => 'required|string',
            'from_name' => 'required|string',
            'from_email' => 'required|string',
            'from_mobile' => 'required|numeric',
            'to_location' => 'required',
            'to_landmark' => 'required|string',
            'to_name' => 'required|string',
            'to_mobile' => 'required|numeric',
            'distance' => 'numeric|min:1',
            'time' => 'required',
            'price' => 'numeric|min:2',
        ]);
        $validator->validate();

        $length = 6;

        $otp = substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 2, $length);
        $is_delivered = 1;

        $Booking = new Booking();
        $Booking->from_location = $request->from_location;
        $Booking->from_lat = $request->from_lat;
        $Booking->from_lon = $request->from_lon;
        $Booking->from_landmark = $request->from_landmark;
        $Booking->from_name = $request->from_name;
        $Booking->from_mobile = $request->from_mobile;
        $Booking->from_email = $request->from_email;
        $Booking->to_location = $request->to_location;
        $Booking->to_lat = $request->to_lat;
        $Booking->to_lon = $request->to_lon;
        $Booking->to_landmark = $request->to_landmark;
        $Booking->to_name = $request->to_name;
        $Booking->to_mobile = $request->to_mobile;
        $Booking->to_email    = $request->to_email;
        $Booking->description = $request->description;
        $Booking->distance = $request->distance;
        $Booking->time = $request->time;
        $Booking->driver_id = $request->driver_id;
        $Booking->price = $request->price;
        $Booking->otp = $otp;
        $Booking->is_delivered = $is_delivered;
        $Booking->save();

        return redirect()->route('admin.manage_booking');
    }

     /**
     * Go to manage events view.
     *
     * @param  Request $request
     * @return view
     */
    public function manageBookingView(Request $request){
        $categoriesbook = Booking::all();
        // echo json_encode($categoriesbook);die;
        return view('/booking.manage_bookings',compact('categoriesbook'));
    }


    /**
     * Go to Edit VehicletType 
     *
     * @param  Request $request
     * @return view
     */
    public function editBooking(Request $request)
    {
        $lead_events_id = $request->app_id;
        $drivername = Driver::get();

        $editedoffers_data = Booking::where('id', $lead_events_id)->first();
        // echo json_encode($businessSerData);die;
        return view('/booking.edit_booking', compact('editedoffers_data', 'drivername'));
    }

    /**
     * Go to Update Offers.
     *
     * @return view
     */
    public function updateBooking(Request $request)
    {
      
            $length = 6;
            $otp = substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 2, $length);
            $is_delivered = 1;
            $hid_id = $request->hid_id;
            $update_booking_data = Booking::where('id', $hid_id)->update(['from_location' => $request->from_location, 'from_lat' => $request->from_lat, 'from_lon' => $request->from_lon,  'from_landmark' => $request->from_landmark, 'from_name' => $request->from_name, 'from_mobile' => $request->from_mobile, 'from_email' => $request->from_email, 'to_location' => $request->to_location, 'to_lat' => $request->to_lat, 'to_lon' => $request->to_lon, 'to_landmark' => $request->to_landmark, 'to_name' => $request->to_name, 'to_mobile' => $request->to_mobile, 'to_email' => $request->to_email, 'description' => $request->description, 'distance' => $request->distance, 'time' => $request->time, 'driver_id' => $request->driver_id, 'price' => $request->price, 'otp' => $otp, 'is_delivered' => $is_delivered]);
           
         
        return redirect()->route('admin.manage_booking');
    }

    /**
     * Go to Delete Offers.
     *
     * @param  Request $request
     * @return view
     */
    public function deleteBooking(Request $request)
    {
        $lead_delete_id = $request->appdel_id;
        $delete_booking = Booking::where('id', $lead_delete_id)->delete();
        return redirect()->route('admin.manage_booking');
    }
}
