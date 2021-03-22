<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Admin | Edit Bookings</title>

    @extends('layouts.master')
    @section('content')
    <!--Page Sidebar Ends-->

    <div class="page-body">

        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="page-header">
            </div>
        </div>
        <!-- Container-fluid Ends -->

        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Booking Details</h5>
                        </div>
                        <div class="card-body">
                        <!-- @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif -->
                            <form class="needs-validation" method="post" name="" action="{{route('admin.update_booking')}}" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                <input type="hidden" id="hid_id" name="hid_id" value="{{$editedoffers_data->id}}">

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Location</label>
                                        <input type="text" class="form-control" name="from_location" id="from_location" placeholder="Enter From Location" value="{{$editedoffers_data->from_location}}" required>
                                      
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Latitude</label>
                                        <input type="text" class="form-control" name="from_lat" id="from_lat" placeholder="Enter Latitude" value="{{$editedoffers_data->from_lat}}" required>
                                        @if ($errors->has('from_lat'))
                    <span class="text-danger">{{ $errors->first('from_lat') }}</span>
                @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Longitude</label>
                                        <input type="text" class="form-control" name="from_lon" id="from_lon" placeholder="Enter Longitude" value="{{$editedoffers_data->from_lon}}" required>
                                       
                                    </div>

                                    

                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Landmark</label>
                                        <input type="text" class="form-control" name="from_landmark" id="from_landmark" placeholder="Enter From Landmark" value="{{$editedoffers_data->from_landmark}}" required>
                                    
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Name</label>
                                        <input type="text" class="form-control" name="from_name" id="from_name" placeholder="Enter From Name" value="{{$editedoffers_data->from_name}}" required>
                                       
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Mobile</label>
                                        <input type="text" class="form-control" name="from_mobile" id="from_mobile" placeholder="Enter Mobile" value="{{$editedoffers_data->from_mobile}}" required>
                                      
                                    </div>

                                </div>

                                <div class="row g-3">
                                <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Email</label>
                                        <input type="text" class="form-control" name="from_email" id="from_email" placeholder="Enter From Email" value="{{$editedoffers_data->from_email}}" required>
                                        
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Location</label>
                                        <input type="text" class="form-control" name="to_location" id="to_location" placeholder="Enter Location" value="{{$editedoffers_data->to_location}}" required>
                                       
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Latitude</label>
                                        <input type="text" class="form-control" name="to_lat" id="to_lat" placeholder="Enter Latitude" value="{{$editedoffers_data->to_lat}}" required>
                                       
                                    </div>

                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Longitude</label>
                                        <input type="text" class="form-control" name="to_lon" id="to_lon" placeholder="Enter Longitude" value="{{$editedoffers_data->to_lon}}" required>
                                      
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Landmark</label>
                                        <input type="text" class="form-control" name="to_landmark" id="to_landmark" placeholder="Enter Landmark" value="{{$editedoffers_data->to_landmark}}" required>
                                     
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Name</label>
                                        <input type="text" class="form-control" name="to_name" id="to_name" placeholder="Enter Name" value="{{$editedoffers_data->to_name}}" required>
                                        
                                    </div>

                                </div>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Mobile</label>
                                        <input type="text" class="form-control" name="to_mobile" id="to_mobile" placeholder="Enter Mobile" value="{{$editedoffers_data->to_mobile}}" required>
                                      
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Email</label>
                                        <input type="text" class="form-control" name="to_email" id="to_email" placeholder="Enter Email" value="{{$editedoffers_data->to_email}}" required>
                                     
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" value="{{$editedoffers_data->description}}" required>
                                      
                                    </div>
                                </div>


                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Distance</label>
                                        <input type="text" class="form-control" name="distance" id="distance" placeholder="Enter Distance" value="{{$editedoffers_data->distance}}" required>
                                        @error('distance')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Time</label>
                                        <input type="text" class="form-control" name="time" id="time" value="{{$editedoffers_data->time}}" required>
                                       
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Driver Name</label>
                                            <select id="driver_id" name="driver_id" class="form-select" required aria-label="select example">
                                                <option value="{{old('driver_id')}}">Select Driver</option>
                                                @foreach($drivername as $driverName)
                                                <option value="{{$driverName->id}}"  <?php echo $editedoffers_data->driver_id	 ==  $driverName->id ? "selected" : ""; ?>>{{$driverName->fname}}</option>
                                                @endforeach
                                            </select>
                                         
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="row g-3">
                                <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" value="{{$editedoffers_data->price}}" placeholder="Enter Price" required>
                                       
                                    </div>                                  
                                </div>                               
                                <div class="mb-3">
                                    <div class="form-check">

                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends -->

    </div>
    </div>
    <!--Page Body Ends-->

    </div>
    <!--page-wrapper Ends-->
    
    @endsection