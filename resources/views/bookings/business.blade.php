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
                    <a href="javascript:void(0);" id="btnExport"><img src="{{asset('ui/img/export-icon.png')}}"> &nbsp; Export</a> &nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#filterModal"><i class="fas fa-filter"></i> &nbsp; Filter</a>
                  </div>
                </div>
                <div id="tableWrap" style="display: none;">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th class="l-redious-15 pl-15">ID</th>
                        <th>From</th>
                        <th>Type</th>
                        <th>Pick Up</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Order Value</th>
                        <th>Delivery Cost</th>
                        <th>Profit</th>
                        <th>GST Number</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{$booking->id}}</td>
                                <td>{{$booking->from_name}}</td>
                                <td></td>
                                <td>{{$booking->from_location}}</td>
                                <td>{{$booking->to_name}}</td>
                                <td>{{$booking->to_mobile}}</td>
                                <td>{{$booking->price}}</td>
                                <td>0</td>
                                <td>0</td>
                                </tr>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th class="l-redious-15 pl-15">ID</th>
                        <th>From</th>
                        <th>Type</th>
                        <th>Pick Up</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Order Value</th>
                        <th>Delivery Cost</th>
                        <th>Profit</th>
                        <th>GST Number</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{$booking->id}}</td>
                                <td>{{$booking->from_name}}</td>
                                <td></td>
                                <td>{{$booking->from_location}}</td>
                                <td>{{$booking->to_name}}</td>
                                <td>{{$booking->to_mobile}}</td>
                                <td>{{$booking->price}}</td>
                                <td>0</td>
                                <td>0</td>
                                </tr>
                            </tr>
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
                      <form class="needs-validation" action="">
                      <div class="modal-body">
                        <!--<h3>Modal Body</h3>-->
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Order Id</label>
                                <input type="text" class="form-control" name="order_id" id="order_id">
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
              </div>
            </div>
          </div>
        </div>
    </div>
</main>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
    jQuery('#btnExport').on('click',function(){
        alert("hello");
        //$('#tblHead').css("display","block");
        var url='data:application/vnd.ms-excel,' + encodeURIComponent(jQuery('#tableWrap').html()) 
        location.href=url
        return false
         //$('#tblHead').css("display","none");
    });
</script>
@endsection
