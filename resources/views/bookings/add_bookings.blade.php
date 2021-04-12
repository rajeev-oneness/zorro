@extends('ui.master')

@section('title')
    Add Bookings
@endsection

@section('content')

<!-- Container-fluid starts -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <h5>Add Booking</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="post" action="{{route('admin.add_bookings')}}">
                    {{csrf_field()}}
                    
                    <h4>From</h4><hr>

                        <div class="row">
                                <div class="col-md-4">
                                    <label for="driver" class="form-label">Customer</label>
                                    <select class="custom-select form-control mr-sm-2" id="from-customer" name="from_customer_id" onchange="chooseFromCustomer()" required>
                                        <option value="">Choose...</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="from_name" id="from_name">
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">From Location</label>
                                    <input type="text" class="form-control" name="from_location" id="from_location" required>
                                    @error('from_location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">From Latitude</label>
                                    <input type="text" class="form-control" name="from_lat" id="from_lat">
                                    @error('from_lat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">From Longnitude</label>
                                    <input type="text" class="form-control" name="from_lon" id="from_lon">
                                    @error('from_lon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">From Landmark</label>
                                    <textarea class="form-control" name="from_landmark" id="from_landmark" cols="30" rows="2"></textarea>
                                    {{-- <input type="text" class="form-control" name="from_landmark" id="from_landmark"> --}}
                                    @error('from_landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">From Mobile</label>
                                    <input type="number" class="form-control" name="from_mobile" id="from_mobile">
                                    @error('from_mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">From Email</label>
                                    <input type="email" class="form-control" name="from_email" id="from_email">
                                    @error('from_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>

                        <h4 class="pt-2">To</h4><hr>

                        <div class="row">
                                <div class="col-md-4">
                                    <label for="driver" class="form-label">Customer</label>
                                    <select class="custom-select form-control mr-sm-2" id="to-customer" name="to_customer_id" onchange="chooseToCustomer()" required>
                                        <option value="">Choose...</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="to_name" id="to_name">
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">To Location</label>
                                    <input type="text" class="form-control" name="to_location" id="to_location" required>
                                    @error('to_location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">To Latitude</label>
                                    <input type="text" class="form-control" name="to_lat" id="to_lat">
                                    @error('to_lat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">To Longnitude</label>
                                    <input type="text" class="form-control" name="to_lon" id="to_lon">
                                    @error('to_lon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">To Landmark</label>
                                    <textarea class="form-control" name="to_landmark" id="to_landmark" cols="30" rows="2"></textarea>
                                    @error('to_landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">To Mobile</label>
                                    <input type="number" class="form-control" name="to_mobile" id="to_mobile">
                                    @error('to_mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">To Email</label>
                                    <input type="email" class="form-control" name="to_email" id="to_email">
                                    @error('to_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                        
                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="2"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Distance <span> (in KM)</span> </label>
                                <input type="text" class="form-control" name="distance" id="distance" onkeypress="return false" required>
                                @error('distance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Time</label>
                                <input type="time" class="form-control" name="time" id="time">
                                @error('time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="driver" class="form-label">Driver</label>
                                <select class="custom-select form-control mr-sm-2" id="driver" name="driver_id" required>
                                    <option value="">Choose...</option>
                                    @foreach ($drivers as $driver)
                                        <option value="{{$driver ->id}}">{{$driver ->fname}} {{$driver ->lname}}</option>
                                    @endforeach
                                </select>
                                @error('time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" id="price" required>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                              
                            </div>
                        </div>
                        <button class="btn order-btn" id="submitButton" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
         
        </div>
    </div>
</div>
<!-- Container-fluid Ends -->

@endsection

@section('script')
    
<script>
    $('form').submit(function() {
        $('#submitButton').attr('disabled', 'true');
    });

    let lat1 = '';
    let lon1 = ''; 

    let lat2 = ''; 
    let lon2 = ''; 


    function chooseFromCustomer() {
        var customerId = $("#from-customer").val();
        $.ajax({
            type: 'POST',
            url: '{{route("admin.booking.customer")}}',           
            data: {'id': customerId, '_token': '{{csrf_token()}}'},
            success:function(data) {
                $("#from_name").val(data.data.name);
                $("#from_location").val(data.data.location);
                $("#from_lat").val(data.data.lat);
                $("#from_lon").val(data.data.long);
                lat1 = data.data.lat;
                lon1 = data.data.long;
                $("#from_mobile").val(data.data.mobile);
                $("#from_email").val(data.data.email);
                $("#from_landmark").val(data.data.landmark);
                calcDistance();    
            }
        }); 
    };

    function chooseToCustomer() {
        var customerId = $("#to-customer").val();
        $.ajax({
            type: 'POST',
            url: '{{route("admin.booking.customer")}}',           
            data: {'id': customerId, '_token': '{{csrf_token()}}'},
            success:function(data) {
                $("#to_name").val(data.data.name);
                $("#to_location").val(data.data.location);
                $("#to_lat").val(data.data.lat);
                $("#to_lon").val(data.data.long);
                lat2 = data.data.lat;
                lon2 = data.data.long;
                $("#to_mobile").val(data.data.mobile);
                $("#to_email").val(data.data.email);
                $("#to_landmark").val(data.data.landmark);
                calcDistance();

            }
        }); 
    }

    google.maps.event.addDomListener(window,'load',initialize);

    function initialize(){

        var autocomplete= new google.maps.places.Autocomplete(document.getElementById('from_location'));

        google.maps.event.addListener(autocomplete, 'place_changed', function(){

            var places = autocomplete.getPlace();

            $('#from_location').val(places.formatted_address);
            $('#from_lon').val(places.geometry.location.lng());
            $('#from_lat').val(places.geometry.location.lat());

            lat1 = places.geometry.location.lat();
            lon1 = places.geometry.location.lng();
            calcDistance();

        });

        var autocomplete2= new google.maps.places.Autocomplete(document.getElementById('to_location'));

        google.maps.event.addListener(autocomplete2, 'place_changed', function(){

            var places = autocomplete2.getPlace();

            $('#to_location').val(places.formatted_address);
            $('#to_lon').val(places.geometry.location.lng());
            $('#to_lat').val(places.geometry.location.lat());

            lat2 = places.geometry.location.lat();
            lon2 = places.geometry.location.lng();
            calcDistance();
        });

    }
    function calcDistance() {
        var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(lat1, lon1), new google.maps.LatLng(lat2, lon2));
        $('#distance').val((distance/1000).toFixed(2));
    }
</script>

@endsection