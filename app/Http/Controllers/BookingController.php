<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Vehicle;
use App\Model\Booking;
use App\Model\Driver;

class BookingController extends Controller
{
    /**
    * Go to Add Vehicle Types.
    *
    * @return view
    */
    public function viewBooking(){
        $drivers = Driver::all();
        return view('/bookings.add_bookings', compact('drivers'));
    }

    /**
     * Go to Add Booking.
     *
     * @return view
     */
    public function addBooking(Request $request)
    {
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
            $Booking->to_email = $request->to_email;
            $Booking->description = $request->description;
            $Booking->distance = $request->distance;
            $Booking->time = $request->time;
            $Booking->driver_id = $request->driver_id;
            $Booking->price = $request->price;
            $Booking->otp = $otp;
            $Booking->is_delivered = $is_delivered;
            $Booking->save();

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
        $booking = Booking::find($bookingId);
        $drivers = Driver::all();
        $sel_driver = Driver::find($booking->driver_id);
        return view('/bookings.edit_booking', compact('booking', 'drivers', 'sel_driver'));
        
    }

    /**
    * Go to Update Offers.
    *
    * @return view
    */
    public function updateBooking(Request $request)
    {  
        
        $booking = Booking::find($request->bookingId);
        $booking->from_location = $request->from_location;
        $booking->from_lat = $request->from_lat;
        $booking->from_lon = $request->from_lon;
        $booking->from_landmark = $request->from_landmark;
        $booking->from_name = $request->from_name;
        $booking->from_mobile = $request->from_mobile;
        $booking->from_email = $request->from_email;
        $booking->to_location = $request->to_location;
        $booking->to_lat = $request->to_lat;
        $booking->to_lon = $request->to_lon;
        $booking->to_landmark = $request->to_landmark;
        $booking->to_name = $request->to_name;
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
        Booking::where('id', $bookingId)->delete();
        return redirect()->route('admin.manage_bookings');
    }
}
