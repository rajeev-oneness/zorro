@extends('ui.master')

@section('title')
    Manage Bookings
@endsection

@section('content')

<main>
    <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12 pl-2 pl-md-4">
            <div class="card border-0">
              <div class="card-body">
                <div class="row m-0 ">
                  <h5 class="card-title col-8 p-0">Business Database</h5>
                  <div class="col-4 text-right ml-auto filter-div">
                    <a href="#"><img src="{{asset('ui/img/export-icon.png')}}"> &nbsp; Export</a> &nbsp; &nbsp;
                    <a href="#"><i class="fas fa-filter"></i> &nbsp; Filter</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th class="l-redious-15 pl-15">Sl.</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th class="r-redious-15">Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <div>
                                        <strong>From: </strong>
                                        {{$booking->from_location}}
                                    </div>
                                    <div>
                                        <strong>To: </strong>
                                        {{$booking->to_location}}
                                    </div>
                                    <div>
                                        <strong>Price: </strong>{{$booking->price}}
                                    </div>
                                    
                                </td>
                                <td>
                                    @if ($booking->is_delivered == 0)
                                      <span class="bg-read">Not Delivered</span>
                                    @else
                                      <span class="bg-green">Delivered</span>
                                    @endif
                                </td>
                                
                                <td>
                                  <a class="edit_vehicletype" href="{{route('admin.edit_bookings', ['id' => $booking->id])}}" title="Edit"><i class="fa fa-edit text-warning"></i></a>
                                </td>
                                <td>
                                  <a class="delete_app" href="{{route('admin.delete_bookings', ['id' => $booking->id])}}" title="Delete"><i class="fa fa-trash text-danger" style="margin-left: 25px;" onclick="return confirm('Are you sure?')"></i></a>
                                </td>

                                <td class="r-redious-15 text-center"><a data-toggle="collapse" href="#collapseExample-{{$booking->id}}" role="button" aria-expanded="false" aria-controls="collapseExample-{{$booking->id}}"><i class="fas fa-caret-down"></i></a></td>
                                <tr class="collapse bg-transparent" id="collapseExample-{{$booking->id}}">
                                  <td colspan="15" class="p-0">
                                      <div class="card card-body bg-light border-radius-0">
                                        <div class="row m-0">
                                          <div class="col-12 col-md-4 border-right pl-0">
                                            <p class="mb-4 pb-2"><b>Pick up Address:  </b>{{$booking->from_location}}  </p>
                                            <p><b>Delivery Address: </b> {{$booking->to_location}} </p>
                                          </div>
                                          <div class="col-12 col-md-3 border-right pl-2 pl-md-5 pr-2 pr-md-5">
                                            <p class="mb-4 pb-2"><b>Pick Up Time :  </b> {{$booking->time}} hrs</p>
                                            {{-- <p><b>Delivered Time : </b> 22:00 hrs</p> --}}
                                          </div>
                                          <div class="col-12 col-md-5 pl-2 pl-md-4">
                                            <div class="form-group mb-0 position-relative">
                                              <textarea class="form-control teble-textarea" rows="4" placeholder="Additional Comments:"></textarea>
                                              <div class="comant-icon">
                                                <i class="far fa-comment-dots"></i>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </td>
                                </tr>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</main>


@endsection