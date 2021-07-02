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
                  <h5 class="card-title col-8 p-0">Master Order Sheet</h5>
                  <div class="col-4 text-right ml-auto filter-div">
                    <a href="javascript:void(0);" id="btnExport"><img src="{{asset('ui/img/export-icon.png')}}"> &nbsp; Export</a> &nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#filterModal"><i class="fas fa-filter"></i> &nbsp; Filter</a>
                  </div>
                </div>
                <div id="tableWrap" style="display: none;">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th class="l-redious-15 pl-15">Order Id</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>Type</th>
                        <th>Pick Up</th>
                        <th>Delivery At</th>
                        <th>Cust. Name</th>
                        <th>Cust. Contact</th>
                        <th>Distance</th>
                        <th>Order Value</th>
                        <th>Time</th>
                        <th>Rider Name</th>
                        <th>Profit</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($bookings as $booking)
                              <tr>
                                <td>{{$booking->id}}</td>
                                <td>{{$booking->created_at}}</td>
                                <td>{{$booking->from_name}}</td>
                                <td></td>
                                <td>{{$booking->from_location}}</td>
                                <td>{{$booking->to_location}}</td>
                                <td>{{$booking->to_name}}</td>
                                <td>{{$booking->to_mobile}}</td>
                                <td>{{$booking->distance}}</td>
                                <td>{{$booking->price}}</td>
                                <td>{{$booking->time}}</td>
                                <td>{{($booking->rider) ? $booking->rider->fname .' '. $booking->rider->lname : ''}}</td>
                                <td>0</td>
                                <td data-toggle="modal" data-target="#changeStatusModal-{{$booking->id}}">
                                  @if (($booking->is_delivered == 0) && ($booking->is_accepted == 0) && ($booking->is_rejected == 0))
                                    <span class="bg-yellow">New Order</span>
                                  @elseif (($booking->is_delivered == 1) && ($booking->is_accepted == 1) && ($booking->is_rejected == 0))
                                    <span class="bg-green">Delivered</span>
                                  @elseif (($booking->is_delivered == 2) && ($booking->is_accepted == 0) && ($booking->is_rejected == 0))
                                    <span class="bg-read">Not Delivered</span>
                                  @elseif (($booking->is_delivered == 0) && ($booking->is_accepted == 1) && ($booking->is_rejected == 0))
                                    <span class="bg-perple">Process</span>
                                  @elseif (($booking->is_delivered == 0) && ($booking->is_accepted == 0) && ($booking->is_rejected == 1))
                                    <span class="bg-read">Rejected</span>
                                  @endif
                                </td>
                              </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th class="l-redious-15 pl-15">Order Id</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>Object</th>
                        <th>Pick Up</th>
                        <th>Delivery At</th>
                        <th>Cust. Name</th>
                        <th>Cust. Contact</th>
                        <th>Distance</th>
                        <th>Order Value</th>
                        <th>Time</th>
                        <th>Rider Name</th>
                        <th>Profit</th>
                        <th>Status</th>
                        <th class="r-redious-15">Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $key => $booking)
                        @php
                        @endphp
                            <tr>
                                <td>{{$booking->id}}</td>
                                <td>{{$booking->created_at}}</td>
                                <td>{{$booking->from_name}}</td>
                                <td>{{($booking->objectDetail)? $booking->objectDetail->name : ''}}</td>
                                <td>{{$booking->from_location}}</td>
                                <td>{{$booking->to_location}}</td>
                                <td>{{$booking->to_name}}</td>
                                <td>{{$booking->to_mobile}}</td>
                                <td>{{$booking->distance}}</td>
                                <td>{{$booking->price}}</td>
                                <td>{{$booking->time}}</td>
                                <td>{{($booking->rider) ? $booking->rider->fname .' '. $booking->rider->lname : ''}}</td>
                                <td>0</td>
                                <td data-toggle="modal" data-target="#changeStatusModal-{{$booking->id}}">
                                    @if (($booking->is_delivered == 0) && ($booking->is_accepted == 0) && ($booking->is_rejected == 0))
                                      <span class="bg-yellow">New Order</span>
                                    @elseif (($booking->is_delivered == 1) && ($booking->is_accepted == 1) && ($booking->is_rejected == 0))
                                      <span class="bg-green">Delivered</span>
                                    @elseif (($booking->is_delivered == 2) && ($booking->is_accepted == 0) && ($booking->is_rejected == 0))
                                      <span class="bg-read">Not Delivered</span>
                                    @elseif (($booking->is_delivered == 0) && ($booking->is_accepted == 1) && ($booking->is_rejected == 0))
                                      <span class="bg-perple">Process</span>
                                    @elseif (($booking->is_delivered == 0) && ($booking->is_accepted == 0) && ($booking->is_rejected == 1))
                                      <span class="bg-read">Rejected</span>
                                    @endif
                                </td>
                                

                                <td class="r-redious-15 text-center"><!-- <a class="edit_vehicletype" href="{{route('admin.edit_bookings', ['id' => encrypt($booking->id)])}}" title="Edit"><i class="fa fa-edit text-warning"></i></a> --><a data-toggle="collapse" href="#collapseExample-{{$booking->id}}" role="button" aria-expanded="false" aria-controls="collapseExample-{{$booking->id}}"><i class="fas fa-caret-down"></i></a></td>
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
                                              <textarea class="form-control teble-textarea" rows="4" id="{{encrypt($booking->id)}}" placeholder="Additional Comments:" onblur="changeDescription(this.id)">{{$booking->description}}</textarea>
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
                            <!-- change status modal -->
                            <div class="modal fade" id="changeStatusModal-{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="changeStatusModal-{{$booking->id}}" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Change order status</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form class="needs-validation" action="{{route('admin.change.booking.status')}}">
                                  <div class="modal-body">
                                        <div class="col-md-12">
                                          <input type="hidden" id="bookingId" name="bookingId" value="{{encrypt($booking->id)}}">
                                            <label for="validationCustom01" class="form-label">Status</label>
                                            <select name="orderStatus" id="orderStatus" class="form-control">
                                              <option value="" hidden>Select</option>
                                              <option value="0">Not Delivered</option>
                                              <option value="1">Delivered</option>
                                              <option value="2">Process</option>
                                              <option value="3">Rejected</option>
                                            </select>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn order-btn">Update Status</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
                

                <!-- basic modal -->
                <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Search</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form class="needs-validation" action="{{route('admin.manage_bookings')}}">
                      <div class="modal-body">
                        <!--<h3>Modal Body</h3>-->
                        
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Order Id</label>
                                <input type="text" class="form-control" name="order_id" id="order_id">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">from</label>
                                <input type="text" class="form-control" name="from_name" id="from_name">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Pickup</label>
                                <input type="text" class="form-control" name="from_location" id="from_location">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Delivery at</label>
                                <input type="text" class="form-control" name="to_location" id="to_location">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Cust. name</label>
                                <input type="text" class="form-control" name="to_name" id="to_name">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Cust. contact</label>
                                <input type="text" class="form-control" name="to_mobile" id="to_mobile">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Order Value</label>
                                <input type="text" class="form-control" name="price" id="price">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Time</label>
                                <input type="time" class="form-control" name="time" id="time">
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Rider Name</label>
                                <select name="driver_id" class="form-control">
                                  <option value="" hidden>Choose...</option>
                                  @foreach ($riders as $rider)
                                      <option value="{{$rider->id}}">{{$rider->fname . ' ' . $rider->lname}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                              <label for="validationCustom01" class="form-label">Rider Name</label>
                              <select name="object_id" class="form-control">
                                <option value="" hidden>Choose...</option>
                                @foreach ($bookingObjects as $bookingObject)
                                    <option value="{{$bookingObject->id}}">{{$bookingObject->name}}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn order-btn">Search</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- <div class="table-responsive">
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
                                  <a class="edit_vehicletype" href="{{route('admin.edit_bookings', ['id' => encrypt($booking->id)])}}" title="Edit"><i class="fa fa-edit text-warning"></i></a>
                                </td>
                                <td>
                                  <a class="delete_app" href="{{route('admin.delete_bookings', ['id' => encrypt($booking->id)])}}" title="Delete"><i class="fa fa-trash text-danger" style="margin-left: 25px;" onclick="return confirm('Are you sure?')"></i></a>
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
                </div> -->
              </div>
            </div>
          </div>
        </div>
    </div>
</main>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
    jQuery('#btnExport').on('click',function(){
        //$('#tblHead').css("display","block");
        var url='data:application/vnd.ms-excel,' + encodeURIComponent(jQuery('#tableWrap').html()) 
        location.href=url
        return false
         //$('#tblHead').css("display","none");
    });
    function changeDescription(bookingId) {
      bookingDescription = $('#'+bookingId).val();
      alert(bookingId);
      $.ajax({
        url: "{{route('change.booking.description')}}",
        type: "POST",
        dataType:'JSON',
        data: { _token: '{{csrf_token()}}', description: bookingDescription, bookingId: bookingId  },
        success:function(data) {
          console.log(data);
          location.reload();
        }
      }) 
    }
</script>
@endsection
