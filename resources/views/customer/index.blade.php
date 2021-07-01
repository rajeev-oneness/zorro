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
                  <h5 class="card-title col-8 p-0">Customer Database</h5>
                  <div class="col-4 text-right ml-auto filter-div">
                    <a href="javascript:void(0);" id="btnExport"><img src="{{asset('ui/img/export-icon.png')}}"> &nbsp; Export</a> &nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#filterModal"><i class="fas fa-filter"></i> &nbsp; Filter</a>
                  </div>
                </div>
                <div id="tableWrap" style="display: none;">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th class="l-redious-15 pl-15">Sl.</th>
                        <th>Customer Name</th>
                        <th>Customer Delivery Address</th>
                        <th>Phone Number</th>
                        <!-- <th style="width: 45%;">Location</th>
                        <th>Edit</th>
                        <th class="r-redious-15">Delete</th> -->
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$customer->name}}</td>
                                <td>
                                  {{$customer->location}}
                                </td>
                                <!-- <td>{{$customer->email}}</td> -->
                                <td>{{$customer->mobile}}</td>
                                
                                <!-- <td>
                                  <a class="edit_vehicletype" href="{{route('admin.customer.edit', ['id' => encrypt($customer->id)])}}" title="Edit"><i class="fa fa-edit text-warning"></i></a>
                                </td>
                                <td class="pr-2">
                                  <a class="delete_app" href="{{route('admin.customer.delete', ['id' => encrypt($customer->id)])}}" title="Delete"><i class="fa fa-trash text-danger" style="margin-left: 25px;" onclick="return confirm('Are you sure?')"></i></a>
                                </td> -->
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th class="l-redious-15 pl-15">Sl.</th>
                        <th>Customer Name</th>
                        <th>Customer Delivery Address</th>
                        <th>Phone Number</th>
                        <!-- <th style="width: 45%;">Location</th>
                        <th>Edit</th>
                        <th class="r-redious-15">Delete</th> -->
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$customer->name}}</td>
                                <td>
                                  {{$customer->location}}
                                </td>
                                <!-- <td>{{$customer->email}}</td> -->
                                <td>{{$customer->mobile}}</td>
                                
                                <!-- <td>
                                  <a class="edit_vehicletype" href="{{route('admin.customer.edit', ['id' => encrypt($customer->id)])}}" title="Edit"><i class="fa fa-edit text-warning"></i></a>
                                </td>
                                <td class="pr-2">
                                  <a class="delete_app" href="{{route('admin.customer.delete', ['id' => encrypt($customer->id)])}}" title="Delete"><i class="fa fa-trash text-danger" style="margin-left: 25px;" onclick="return confirm('Are you sure?')"></i></a>
                                </td> -->
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
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Mobile No</label>
                            <input type="text" class="form-control" name="mobile" id="mobile">
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
        //$('#tblHead').css("display","block");
        var url='data:application/vnd.ms-excel,' + encodeURIComponent(jQuery('#tableWrap').html()) 
        location.href=url
        return false
         //$('#tblHead').css("display","none");
    });
</script>
@endsection