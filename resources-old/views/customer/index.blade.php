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
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style="width: 45%;">Location</th>
                        <th>Edit</th>
                        <th class="r-redious-15">Delete</th>
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
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->mobile}}</td>
                                <td>
                                  <strong>Address : </strong>{{$customer->location}} <br>
                                  <strong>Landmark : </strong>{{$customer->landmark}} <br>
                                  <strong>Laongitude : </strong>{{$customer->long}} <br>
                                  <strong>Latitude : </strong>{{$customer->lat}} <br>
                                </td>
                                <td>
                                  <a class="edit_vehicletype" href="{{route('admin.customer.edit', ['id' => encrypt($customer->id)])}}" title="Edit"><i class="fa fa-edit text-warning"></i></a>
                                </td>
                                <td class="pr-2">
                                  <a class="delete_app" href="{{route('admin.customer.delete', ['id' => encrypt($customer->id)])}}" title="Delete"><i class="fa fa-trash text-danger" style="margin-left: 25px;" onclick="return confirm('Are you sure?')"></i></a>
                                </td>
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