@extends('ui.master')

@section('title')
    Edit Job Timing
@endsection

@section('content')

        <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Job Timing</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="post" name="" action="{{route('admin.update_jobtiming')}}" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                <input type="hidden" id="hid_id" name="hid_id" value="{{$editedoffers_data->id}}">

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Start Time</label>
                                            <input type="time" class="form-control" name="start_time" id="start_time" value="{{$editedoffers_data->start_time}}" required>
                                            @error('start_time')
					<span class="text-danger">{{ $message }}</span>
					@enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">End Time</label>
                                            <input type="time" class="form-control" name="end_time" id="end_time" value="{{$editedoffers_data->end_time}}" required>
                                            @error('end_time')
					<span class="text-danger">{{ $message }}</span>
					@enderror
                                        </div>
                                     
                                    </div>
                                
                                    <div class="mb-3">
                                        <div class="form-check">
                                          
                                        </div>
                                    </div>
                                    <button class="btn order-btn" type="submit">Submit form</button>
                                </form>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        <!-- Container-fluid Ends -->

@endsection