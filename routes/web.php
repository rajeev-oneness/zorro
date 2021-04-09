<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('ui.login');
})->name('adminlogin');

Route::post('login_get','AdminLoginController@loginGet')->name('admins.login');

Route::get('/admin','AdminLoginController@dashboardView')->name('admin.dashboard')->middleware(['auth:admin']);

Route::prefix('admin')->group(function () {




    

    Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        //-------------------------------------------------------------- Vehicle Type Section-----------------------------------------------//


        Route::get('vehicletype_view', 'VehicleController@vehicletypeView')->name('admin.vehicletype_view');

        Route::post('/add_vehicletype', 'VehicleController@addVehicleType')->name('admin.add_vehicletype');

        //--------------------------------------------------------------Manage Vehicle Type Section-----------------------------------------------//

        Route::get('/manage_vehicles', 'VehicleController@manageVehicletType')->name('admin.manage_vehicles');


        Route::post('/edit_vehicletype', 'VehicleController@editVehicleType')->name('edit_vehicletype');

        Route::post('/update_vehicletype', 'VehicleController@updateVehicleType')->name('admin.update_vehicletype');

        Route::post('/delete_vehicletype', 'VehicleController@deleteVehicleType')->name('delete_vehicletype');

        //-------------------------------------------------------------- Job Timing Section-----------------------------------------------//


        Route::get('jobtiming_view', 'JobtimingController@jobtiming_view')->name('admin.jobtiming_view');

        Route::post('/add_jobtiming', 'JobtimingController@addJobTiming')->name('admin.add_jobtiming');

        //--------------------------------------------------------------Manage  Job Timing Section-----------------------------------------------//

        Route::get('/manage_jobtiming', 'JobtimingController@manageJobtimingView')->name('admin.manage_jobtiming');


        Route::get('/edit_jobtiming/{id}', 'JobtimingController@editJobTiming')->name('edit_jobtiming');

        Route::post('/update_jobtiming', 'JobtimingController@updateJobTiming')->name('admin.update_jobtiming');

        Route::post('/delete_jobtiming', 'JobtimingController@deleteJobTiming')->name('delete_jobtiming');

        //-------------------------------------------------------------- Drivers Section-----------------------------------------------//


        Route::get('driver_view', 'DriverController@driverView')->name('admin.driver_view');

        Route::post('/add_drivers', 'DriverController@addDriver')->name('admin.add_drivers');

        //--------------------------------------------------------------Manage Drivers Section-----------------------------------------------//

        Route::get('/manage_drivers', 'DriverController@manageDriversView')->name('admin.manage_drivers');


        Route::get('/edit_driver/{id}', 'DriverController@editDriver')->name('edit_driver');

        Route::post('/update_driver', 'DriverController@updateDriver')->name('admin.update_driver');

        Route::post('/delete_driver', 'DriverController@deleteDriver')->name('delete_driver');

          //-------------------------------------------------------------- area Section-----------------------------------------------//


          Route::get('area_view', 'AreaController@areaView')->name('admin.area_view');

          Route::post('/add_areas', 'AreaController@addAreas')->name('admin.add_areas');
  
          //--------------------------------------------------------------manage Area Section-----------------------------------------------//
  
          Route::get('/manage_areas', 'AreaController@manageAreaView')->name('admin.manage_areas');
  
  
          Route::get('/edit_areas/{id}', 'AreaController@editAreas')->name('edit_areas');
  
          Route::post('/update_driver1', 'AreaController@updateArea')->name('admin.update_driver1');
  
          Route::post('/delete_areas', 'AreaController@deleteArea')->name('delete_areas');

           //-------------------------------------------------------------- Booking Section-----------------------------------------------//
           Route::resource('booking', 'BookingController');

           Route::get('booking', 'BookingController@bookingView')->name('admin.booking');

           Route::post('/add_booking', 'BookingController@addBooking')->name('admin.add_booking');
   
           //--------------------------------------------------------------manage Booking Section-----------------------------------------------//
   
           Route::get('/manage_booking', 'BookingController@manageBookingView')->name('admin.manage_booking');
   
   
           Route::get('/edit_booking/{id}', 'BookingController@editBooking')->name('edit_booking');
   
           Route::post('/update_booking', 'BookingController@updateBooking')->name('admin.update_booking');
   
           Route::post('/delete_booking', 'BookingController@deleteBooking')->name('delete_booking');


          
//--------------------------------------------------------------Admin Logout Section-----------------------------------------------//
Route::get('change_password', 'AdminLoginController@changePassword')->name('admin.change_password');	

Route::post('update_password', 'AdminLoginController@updatePassword')->name('admin.update_password');
        

        //--------------------------------------------------------------Booking Section-----------------------------------------------//
        Route::get('view-booking', 'BookingController@viewBooking')->name('admin.view_bookings');
        Route::get('manage-booking', 'BookingController@manageBooking')->name('admin.manage_bookings');
        Route::post('add-booking', 'BookingController@addBooking')->name('admin.add_bookings');
        Route::get('edit-booking/{id}', 'BookingController@editBooking')->name('admin.edit_bookings');
        Route::post('update-booking', 'BookingController@updateBooking')->name('admin.update_bookings');
        Route::get('delete-booking/{id}', 'BookingController@deleteBooking')->name('admin.delete_bookings');

        Route::post('get-customer-details', 'BookingController@getCustomer')->name('admin.booking.customer');


        //--------------------------------------------------------------Customer Section-----------------------------------------------//
        Route::group(['prefix' => 'customer'], function(){
            Route::get('manage', 'CustomerController@index')->name('admin.customer.index');
            Route::get('create', 'CustomerController@create')->name('admin.customer.create');
            Route::post('store', 'CustomerController@store')->name('admin.customer.store');
            Route::get('edit/{id}', 'CustomerController@edit')->name('admin.customer.edit');
            Route::post('update', 'CustomerController@update')->name('admin.customer.update');
            Route::get('delete/{id}', 'CustomerController@delete')->name('admin.customer.delete');
        });
        
        Route::post('modalstore', 'AdminLoginController@modalStore')->name('dashboard.modal.store');
    });
});
