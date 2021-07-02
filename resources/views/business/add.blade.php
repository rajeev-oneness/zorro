@extends('ui.master')

@section('title')
    Add Business
@endsection

@section('content')

<!-- Container-fluid starts -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <h5>Add Business</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="post" action="{{route('admin.business.store')}}">
                        
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Business Name</label>
                                <input required type="text" class="form-control" name="business_name" id="business_name" required>
                                @error('business_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Type</label>
                                <input required type="text" class="form-control" name="type" id="type" required>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Name</label>
                                <input required type="text" class="form-control" name="name" id="name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Location</label>
                                <input required type="text" class="form-control" name="location" id="location" required>
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Phn no</label>
                                <input required type="number" class="form-control" name="phn_no" id="phn_no">
                                @error('phn_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">GST</label>
                                <input required type="text" class="form-control" name="gst_no" id="gst_no">
                                @error('gst_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Delivery Cost</label>
                                <input required type="number" class="form-control" name="delivery_cost" id="delivery_cost">
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