<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Vehicle;
use App\Model\Booking;
use App\Model\Driver;
use App\Model\PricingBracket;
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
        $pricingBrackets = PricingBracket::all();
        $customers = Customer::all();
        // dd(\json_decode($pricingBrackets));
        return view('/bookings.add_bookings', compact('drivers', 'pricingBrackets', 'customers'));
    }

    /**
     * Go to Add Booking.
     *
     * @return view
     */
    public function addBooking(Request $req)
    {
            $length = 6;

            //$otp = substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 2, $length);
            $otp = '1234';
            $is_delivered = 0;

            $booking = new Booking();
            $booking->from_location = $req->from_location;
            $booking->from_lat = $req->from_lat;
            $booking->from_lon = $req->from_lon;
            $booking->from_landmark = $req->from_landmark;
            $booking->from_name = $req->from_name;
            // $booking->from_customer_id = $req->from_customer_id;
            $booking->from_mobile = $req->from_mobile;
            $booking->from_email = $req->from_email;

            $fromcustomer = Customer::where('name', $req->from_name)->where('mobile', $req->from_mobile)->where('email', $req->from_email)->first();
            if(empty($fromcustomer)) {
                $customer = new Customer;
                $customer->name = $req->from_name;
                $customer->email = $req->from_email;
                $customer->mobile = $req->from_mobile;
                $customer->location = $req->from_location;
                $customer->lat = $req->from_lat;
                $customer->long = $req->from_lon;
                $customer->landmark = $req->from_landmark;
                $customer->save();
                $booking->from_customer_id = $customer->id;
            }
            $booking->from_customer_id = $fromcustomer->id;
            
            $booking->to_location = $req->to_location;
            $booking->to_lat = $req->to_lat;
            $booking->to_lon = $req->to_lon;
            $booking->to_landmark = $req->to_landmark;
            $booking->to_name = $req->to_name;
            // $booking->to_customer_id = $req->to_customer_id;
            $booking->to_mobile = $req->to_mobile;
            $booking->to_email = $req->to_email;

            $tocustomer = Customer::where('name', $req->to_name)->where('mobile', $req->to_mobile)->where('email', $req->to_email)->first();
            if(empty($tocustomer)) {
                $customer = new Customer;
                $customer->name = $req->to_name;
                $customer->email = $req->to_email;
                $customer->mobile = $req->to_mobile;
                $customer->location = $req->to_location;
                $customer->lat = $req->to_lat;
                $customer->long = $req->to_lon;
                $customer->landmark = $req->to_landmark;
                $customer->save();
                $booking->to_customer_id = $customer->id;
            }
            $booking->to_customer_id = $tocustomer->id;

            $booking->description = $req->description;
            $booking->distance = $req->distance;
            $booking->time = $req->time;
            $booking->driver_id = $req->driver_id;
            $booking->price = $req->price;
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
        $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
        $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';
        $order_id = (isset($_GET['order_id']) && $_GET['order_id']!='')?$_GET['order_id']:'';

        $bookings = Booking::with('rider')
        ->when($start_date, function($query) use ($request){
            $query->where('created_at', '>=', $request->start_date);
        })
        ->when($end_date, function($query) use ($request){
            $query->where('created_at', '<=', $request->end_date);
        })
        ->when( $order_id, function($query) use ($request){
            $query->where('id', '=', $request->order_id);
        })
        ->get();

        //$bookings = Booking::with('rider')->orderBy('created_at', 'DESC')->get();
        //  dd($bookings);
        return view('bookings.manage_bookings',compact('bookings'));
    }

    public function business(Request $request){
        $order_id = (isset($_GET['order_id']) && $_GET['order_id']!='')?$_GET['order_id']:'';

        if($order_id!=''){
            $bookings = Booking::with('rider')->where('id',$order_id)->orderBy('created_at', 'DESC')->get();
        }else{
            $bookings = Booking::with('rider')->orderBy('created_at', 'DESC')->get();
        }
        
         //dd($bookings);
        return view('/bookings.business',compact('bookings'));
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
    public function updateBooking(Request $req)
    {  
        
        $booking = Booking::find(decrypt($req->bookingId));
        $booking->from_location = $req->from_location;
        $booking->from_lat = $req->from_lat;
        $booking->from_lon = $req->from_lon;
        $booking->from_landmark = $req->from_landmark;
        $booking->from_name = $req->from_name;
        $booking->from_customer_id = $req->from_customer_id;
        $booking->from_mobile = $req->from_mobile;
        $booking->from_email = $req->from_email;

        $fromcustomer = Customer::where('name', $req->from_name)->where('mobile', $req->from_mobile)->where('email', $req->from_email)->first();   
        if(empty($fromcustomer)) {
            $customer = Customer::find($req->from_customer_id);
            $customer->name = $req->from_name;
            $customer->email = $req->from_email;
            $customer->mobile = $req->from_mobile;
            $customer->location = $req->from_location;
            $customer->lat = $req->from_lat;
            $customer->long = $req->from_lon;
            $customer->landmark = $req->from_landmark;
            $customer->save();
        }

        $booking->to_location = $req->to_location;
        $booking->to_lat = $req->to_lat;
        $booking->to_lon = $req->to_lon;
        $booking->to_landmark = $req->to_landmark;
        $booking->to_name = $req->to_name;
        $booking->to_customer_id = $req->to_customer_id;
        $booking->to_mobile = $req->to_mobile;
        $booking->to_email = $req->to_email;

        $tocustomer = Customer::where('name', $req->to_name)->where('mobile', $req->to_mobile)->where('email', $req->to_email)->first();
        if(empty($tocustomer)) {
            $customer = Customer::find($req->to_customer_id);
            $customer->name = $req->to_name;
            $customer->email = $req->to_email;
            $customer->mobile = $req->to_mobile;
            $customer->location = $req->to_location;
            $customer->lat = $req->to_lat;
            $customer->long = $req->to_lon;
            $customer->landmark = $req->to_landmark;
            $customer->save();
        }

        $booking->description = $req->description;
        $booking->distance = $req->distance;
        $booking->time = $req->time;
        $booking->driver_id = $req->driver_id;
        $booking->price = $req->price;
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

    public function changeStatus(Request $req)
    {
        $booking = Booking::find(decrypt($req->bookingId));
        if($req->orderStatus == 0) {
            $status = [2, 0, 0];
        } elseif($req->orderStatus == 1) {
            $status = [1, 1, 0];
        } elseif($req->orderStatus == 2) {
            $status = [0, 1, 0];
        } elseif($req->orderStatus == 3) {
            $status = [0, 0, 1];
        }
        $booking->is_delivered = $status[0];
        $booking->is_accepted = $status[1];
        $booking->is_rejected = $status[2];
        $booking->save();
        return redirect()->route('admin.manage_bookings');
    }
    
    public function changeDescription(Request $req)
    {
        // dd($req->all());
        $booking = Booking::find(decrypt($req->bookingId));
        // dd($booking);
        $booking->description = $req->description;
        $booking->save();
        return response()->json([
            'error' => false, 
            'message' => 'Booking description changed', 
            'data' =>$booking
        ]);
    }
    
    public function calculatePrice(Request $req)
    {
        $price = helperFunction($req->distance);
        return response()->json([
            'error' => false, 
            'message' => 'calculated price', 
            'data' =>$price
        ]);
    }
}
