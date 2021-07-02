@extends('ui.master')

@section('title')
    Edit Business
@endsection

@section('content')

<!-- Container-fluid starts -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Business</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="post" action="{{route('admin.business.update')}}">
                        
                        @csrf
                        <input type="hidden" name="businessId" value="{{base64_encode($business->id)}}">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Business Name</label>
                                <input type="text" class="form-control" name="business_name" id="business_name" value="{{$business->business_name}}" required>
                                @error('business_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Type</label>
                                <input type="text" class="form-control" name="type" id="type" value="{{$business->type}}" required>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$business->name}}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" id="location" value="{{$business->location}}" required>
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Phn no</label>
                                <input type="number" class="form-control" name="phn_no" id="phn_no" value="{{$business->phn_no}}" required>
                                @error('phn_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">GST</label>
                                <input type="text" class="form-control" name="gst_no" id="gst_no" value="{{$business->gst_no}}" required>
                                @error('gst_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Delivery Cost</label>
                                <input type="number" class="form-control" name="delivery_cost" id="delivery_cost" value="{{$business->delivery_cost}}" required>
                                @error('delivery_cost')
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
</script>

<script>
    google.maps.event.addDomListener(window,'load',initialize);

    function initialize(){

        var autocomplete= new google.maps.places.Autocomplete(document.getElementById('location'));

        google.maps.event.addListener(autocomplete, 'place_changed', function(){

            var places = autocomplete.getPlace();
            console.log(places);

            $('#location').val(places.formatted_address);
            $('#lon').val(places.geometry.location.lng());
            $('#lat').val(places.geometry.location.lat());

        });

    }
</script>
@endsection