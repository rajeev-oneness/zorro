<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Vehicle;
use App\Model\Booking;
use App\Model\Driver;
use App\Model\Customer;

class BookingController extends Controller
{
    /**
    * Go to Add Vehicle Types.
    *
    * @return view
    */
    public function viewBooking(){
        $drivers = Driver::all();
        $customers = Customer::all();
        return view('/bookings.add_bookings', compact('drivers', 'customers'));
    }

    /**
     * Go to Add Booking.
     *
     * @return view
     */
    public function addBooking(Request $request)
    {
            $length = 6;

            //$otp = substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 2, $length);
            $otp = '1234';
            $is_delivered = 0;

            $booking = new Booking();
            $booking->from_location = $request->from_location;
            $booking->from_lat = $request->from_lat;
            $booking->from_lon = $request->from_lon;
            $booking->from_landmark = $request->from_landmark;
            $booking->from_name = $request->from_name;
            $booking->from_customer_id = $request->from_customer_id;
            $booking->from_mobile = $request->from_mobile;
            $booking->from_email = $request->from_email;
            $booking->to_location = $request->to_location;
            $booking->to_lat = $request->to_lat;
            $booking->to_lon = $request->to_lon;
            $booking->to_landmark = $request->to_landmark;
            $booking->to_name = $request->to_name;
            $booking->to_customer_id = $request->to_customer_id;
            $booking->to_mobile = $request->to_mobile;
            $booking->to_email = $request->to_email;
            $booking->description = $request->description;
            $booking->distance = $request->distance;
            $booking->time = $request->time;
            $booking->driver_id = $request->driver_id;
            $booking->price = $request->price;
            $booking->otp = $otp;
            $booking->is_delivered = $is_delivered;
            $booking->save();

            return redirect()->route('admin.manage_bookings');
    }

     /**
     * Go to manage events view.
     *
     * @param  Request $request
     * @return view
     */
    public function manageBooking(Request $request){
        $bookings = Booking::orderBy('created_at', 'DESC')->get();
        // dd($bookings);
        return view('/bookings.manage_bookings',compact('bookings'));
    }

     /**
     * Go to Edit VehicletType 
     *
     * @param  Request $request
     * @return view
     */
    public function editBooking($bookingId) {
        $booking = Booking::find(decrypt($bookingId));
        $customers = Customer::all();
        $sel_from_customer = Customer::find($booking->from_customer_id);
        $sel_to_customer = Customer::find($booking->to_customer_id);
        $drivers = Driver::all();
        $sel_driver = Driver::find($booking->driver_id);
        return view('/bookings.edit_booking', compact('booking', 'drivers', 'sel_driver','customers','sel_from_customer','sel_to_customer'));
        
    }

    /**
    * Go to Update Offers.
    *
    * @return view
    */
    public function updateBooking(Request $request)
    {  
        
        $booking = Booking::find(decrypt($request->bookingId));
        $booking->from_location = $request->from_location;
        $booking->from_lat = $request->from_lat;
        $booking->from_lon = $request->from_lon;
        $booking->from_landmark = $request->from_landmark;
        $booking->from_name = $request->from_name;
        $booking->from_customer_id = $request->from_customer_id;
        $booking->from_mobile = $request->from_mobile;
        $booking->from_email = $request->from_email;
        $booking->to_location = $request->to_location;
        $booking->to_lat = $request->to_lat;
        $booking->to_lon = $request->to_lon;
        $booking->to_landmark = $request->to_landmark;
        $booking->to_name = $request->to_name;
        $booking->to_customer_id = $request->to_customer_id;
        $booking->to_mobile = $request->to_mobile;
        $booking->to_email = $request->to_email;
        $booking->description = $request->description;
        $booking->distance = $request->distance;
        $booking->time = $request->time;
        $booking->driver_id = $request->driver_id;
        $booking->price = $request->price;
        $booking->is_delivered = 0;         
        $booking->save();
        return redirect()->route('admin.manage_bookings');
    }

     /**
     * Go to Delete Offers.
     *
     * @param  Request $request
     * @return view
     */
    public function deleteBooking($bookingId) {
        Booking::where('id', decrypt($bookingId))->delete();
        return redirect()->route('admin.manage_bookings');
    }

    public function getCustomer(Request $request) {
        $customer = Customer::find($request->id);
        return response()->json([
            'error' => false, 
            'message' => 'Customer data', 
            'data' =>$customer
        ]);
    }
}
