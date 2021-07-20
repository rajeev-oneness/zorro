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
                    <form class="needs-validation" method="post" action="{{route('admin.add_bookings')}}" id="booking_form">
                    {{csrf_field()}}
                    
                    <h4>From</h4><hr>

                        <div class="row">
                                <div class="col-md-4">
                                    <label for="driver" class="form-label">Customer</label>
                                    {{-- <select class="custom-select form-control mr-sm-2" id="from-customer" name="from_customer_id" onchange="chooseFromCustomer()" required>
                                        <option value="">Choose...</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" class="form-control" name="from_name">
                                </div>
                                {{-- <input type="hidden" class="form-control" name="from_name" id="from_name"> --}}
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
                                    {{-- <select class="custom-select form-control mr-sm-2" id="to-customer" name="to_customer_id" onchange="chooseToCustomer()" required>
                                        <option value="">Choose...</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" class="form-control" name="to_name">
                                </div>
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
                                <input type="text" class="form-control" name="distance" id="distance" readonly onkeypress="return false" required>
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
                                <label for="driver" class="form-label">Rider</label>
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
                                <input type="number" class="form-control" readonly id="total_price" required>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="driver" class="form-label">Object Type</label>
                                <select class="custom-select form-control mr-sm-2" id="booking_object" name="booking_object" required>
                                    <option value="">Choose...</option>
                                    @foreach ($bookingObjects as $bookingObject)
                                        <option value="{{$bookingObject->id}}">{{$bookingObject->name}}</option>
                                    @endforeach
                                </select>
                                @error('time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">OTP</label>
                                <input type="number" class="form-control" name="otp" id="otp" value="1234" required>
                                @error('otp')
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

    google.maps.event.addDomListener(window,'load',initialize);

    function initialize(){

        var autocomplete= new google.maps.places.Autocomplete(document.getElementById('from_location'));

        google.maps.event.addListener(autocomplete, 'place_changed', function(){

            var places = autocomplete.getPlace();
            // console.log(places);
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
        let actualDistance = 0;

        //distance calculation
        var directionsService = new google.maps.DirectionsService();
        var request = {
            origin      : new google.maps.LatLng(lat1, lon1),
            destination : new google.maps.LatLng(lat2, lon2),
            travelMode  : google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(response, status) {
            if ( status == google.maps.DirectionsStatus.OK ) {
                actualDistance = ((response.routes[0].legs[0].distance.value)/1000).toFixed(2);
                $('#distance').val(actualDistance);
            }
            else {
                // oops, there's no route between these two locations
                // every time this happens, a kitten dies
                // so please, ensure your address is formatted properly
            }
        });
        
        // var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(lat1, lon1), new google.maps.LatLng(lat2, lon2));
        // let actualDistance = (distance/1000).toFixed(2);
        
        $('#distance').val(actualDistance);
        $.ajax({
            url: "{{route('calculate.price')}}",
            type: "POST",
            data: { _token: '{{csrf_token()}}', distance: actualDistance , for: 'cost' },
            success:function(data) {
                console.log('cost', data);
                $("#total_price").val(data.data);
            }
        })
        // $.ajax({
        //     url: "{{route('calculate.price')}}",
        //     type: "POST",
        //     data: { _token: '{{csrf_token()}}', distance: actualDistance, for: 'riderFee' },
        //     success:function(data) {
        //         console.log('riderFee', data);
        //         field = "<input type='hidden' value='"+data.data+"'>";
        //         $("#booking_form").append(field);
        //     }
        // })
    }
</script>

@endsection