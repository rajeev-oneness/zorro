<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Admin | Add Bookings</title>

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
                            <h5>Add Booking Details</h5>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="post" name="" action="{{route('admin.add_booking')}}" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Location</label>
                                        <input type="text" class="form-control" name="from_location" id="from_location" value="{{old('from_location')}}" required>
                                        @error('from_location')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Latitude</label>
                                        <input type="text" class="form-control" name="from_lat" id="from_lat" value="{{old('from_lat')}}" required>
                                        @error('from_lat')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Longitude</label>
                                        <input type="text" class="form-control" name="from_lon" id="from_lon" value="{{old('from_lon')}}" required>
                                        @error('from_lon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    

                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Landmark</label>
                                        <input type="text" class="form-control" name="from_landmark" id="from_landmark" value="{{old('from_landmark')}}" required>
                                        @error('from_landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Name</label>
                                        <input type="text" class="form-control" name="from_name" id="from_name" value="{{old('from_name')}}" required>
                                        @error('from_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Mobile</label>
                                        <input type="text" class="form-control" name="from_mobile" id="from_mobile" value="{{old('from_mobile')}}" required>
                                        @error('from_mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row g-3">
                                <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">From Email</label>
                                        <input type="text" class="form-control" name="from_email" id="from_email" value="{{old('from_email')}}" required>
                                        @error('from_email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Location</label>
                                        <input type="text" class="form-control" name="to_location" id="to_location" value="{{old('to_location')}}" required>
                                        @error('to_location')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Latitude</label>
                                        <input type="text" class="form-control" name="to_lat" id="to_lat" value="{{old('to_lat')}}" required>
                                        @error('to_lat')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Longitude</label>
                                        <input type="text" class="form-control" name="to_lon" id="to_lon" value="{{old('to_lon')}}" required>
                                        @error('to_lon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Landmark</label>
                                        <input type="text" class="form-control" name="to_landmark" id="to_landmark" value="{{old('to_landmark')}}" required>
                                        @error('to_landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Name</label>
                                        <input type="text" class="form-control" name="to_name" id="to_name" value="{{old('to_name')}}" required>
                                        @error('to_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Mobile</label>
                                        <input type="text" class="form-control" name="to_mobile" id="to_mobile" value="{{old('to_mobile')}}" required>
                                        @error('to_mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">To Email</label>
                                        <input type="text" class="form-control" name="to_email" id="to_email" value="{{old('to_email')}}" required>
                                        @error('to_email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{old('description')}}" required>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Distance</label>
                                        <input type="text" class="form-control" name="distance" id="distance" value="{{old('distance')}}" required>
                                        @error('distance')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Time</label>
                                        <input type="text" class="form-control" name="time" id="time" value="{{old('time')}}" required>
                                        @error('time')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Driver Name</label>
                                            <select id="driver_id" name="driver_id" class="form-select" required aria-label="select example">
                                                <option value="{{old('driver_id')}}">Select Driver</option>
                                                @foreach($driver as $driverName)
                                                <option value="{{$driverName->id}}">{{$driverName->fname}}</option>
                                                @endforeach
                                            </select>
                                            @error('preferred_area_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="row g-3">
                                <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}" required>
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
    <script>
 function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#img-upload').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#image").change(function() {
        readURL(this);
      });

      function readURL1(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#img-upload1').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#license_image").change(function() {
        readURL1(this);
      });

</script>
    @endsection