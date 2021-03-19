<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Admin | Add Booking</title>

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
                                <h5>Add Booking</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="post" name="" action="{{route('admin.update_bookings')}}" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                <input type="hidden" value="{{$booking->id}}" name="bookingId">
                                    <div class="row">
                                        <h4>From</h4>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">From Location</label>
                                                <input type="text" class="form-control" name="from_location" id="from_location" value="{{$booking->from_location}}" required>
                                                @error('from_location')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">From Latitude</label>
                                                <input type="text" class="form-control" name="from_lat" id="from_lat" value="{{$booking->from_lat}}">
                                                @error('from_lat')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">From Longnitude</label>
                                                <input type="text" class="form-control" name="from_lon" id="from_lon" value="{{$booking->from_lon}}">
                                                @error('from_lon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">From Landmark</label>
                                                <textarea class="form-control" name="from_landmark" id="from_landmark" cols="30" rows="2">{{$booking->from_landmark}}</textarea>
                                                @error('from_landmark')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">From Name</label>
                                                <input type="text" class="form-control" name="from_name" id="from_name" value="{{$booking->from_name}}">
                                                @error('from_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">From Mobile</label>
                                                <input type="number" class="form-control" name="from_mobile" id="from_mobile" value="{{$booking->from_mobile}}">
                                                @error('from_mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">From Email</label>
                                                <input type="email" class="form-control" name="from_email" id="from_email" value="{{$booking->from_email}}">
                                                @error('from_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <h4>To</h4>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">To Location</label>
                                                <input type="text" class="form-control" name="to_location" id="to_location" value="{{$booking->to_location}}" required>
                                                @error('to_location')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">To Latitude</label>
                                                <input type="text" class="form-control" name="to_lat" id="to_lat" value="{{$booking->to_lat}}">
                                                @error('to_lat')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">To Longnitude</label>
                                                <input type="text" class="form-control" name="to_lon" id="to_lon" value="{{$booking->to_lon}}">
                                                @error('to_lon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">To Landmark</label>
                                                <textarea class="form-control" name="to_landmark" id="to_landmark" cols="30" rows="2">{{$booking->to_landmark}}</textarea>
                                                @error('to_landmark')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">To Name</label>
                                                <input type="text" class="form-control" name="to_name" id="to_name" value="{{$booking->to_name}}">
                                                @error('to_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">To Mobile</label>
                                                <input type="number" class="form-control" name="to_mobile" id="to_mobile" value="{{$booking->to_mobile}}">
                                                @error('to_mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">To Email</label>
                                                <input type="email" class="form-control" name="to_email" id="to_email" value="{{$booking->to_email}}">
                                                @error('to_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                    </div>
                                    
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="2">{{$booking->description}}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Distance</label>
                                            <input type="number" class="form-control" name="distance" id="distance" value="{{$booking->distance}}">
                                            @error('distance')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Time</label>
                                            <input type="time" class="form-control" name="time" id="time" value="{{$booking->time}}">
                                            @error('time')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="driver" class="form-label">Driver</label>
                                            <select class="custom-select form-control mr-sm-2" id="driver" name="driver_id">
                                                <?php
                                                    foreach ($drivers as $driver) {
                                                    $selected = ($sel_driver->id == $driver->id) ? "selected" : "";
                                                    echo '<option '.$selected.' value="'.$driver->id.'">'.$driver->fname.' '.$driver->lname.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            @error('time')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price" id="price" value="{{$booking->price}}" required>
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                          
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
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