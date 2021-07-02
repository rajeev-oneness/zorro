@extends('ui.master')

@section('title')
    Dashboard
@endsection

@section('content')
<main>
  <div class="container-fluid">
      <div class="row m-0 mt-5">
          <div class="col-12 col-md-8">
            <div class="row m-0">
              <div class="card-body card border-0 height-150">
                <div class="row m-0">
                  <div class="col-12 col-md-8 border-right text-right">
                    <img src="{{asset('ui/img/d-i-zorro.png')}}" class="di-zoro">
                    <h3 class="zoro-d">ZORRRO Deliveries</h3>
                  </div>
                  <div class="col-12 col-md-4 pl-2 pl-md-4 text-center pt-4">
                    <p>Select the delivery dtatus</p>
                    <p>
                      <b>Start</b> 
                      <a href="javascript:void(0);" id="delivery_status" class="tuggle-btn">
                        @if ($deliverStatus[0] == 1)
                        <i class="fas fa-toggle-on"></i>
                        @else
                        <i class="fas fa-toggle-off"></i>
                        @endif
                      </a>
                      <b>Stop</b>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row m-0 pt-5 pb-5">
              <div class="col-md-4 col-12 p-0">
                <div class="card-body card border-0">
                  <a href="" class="ml-auto da-filter"><i class="fas fa-filter"></i> Filter</a>
                  <div class="row m-0 pt-3 da-rev">
                    <div class="col-4 pl-md-0 chartbar-icon">
                      <i class="far fa-chart-bar c-icon"></i>
                    </div>
                    <div class="col-8 pr-md-0">
                      <p>
                        Total Revenue
                        <span>Rs. {{($totalAmount-$riderFee)}}</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="card-body card border-0">
                  <a href="" class="ml-auto da-filter"><i class="fas fa-filter"></i> Filter</a>
                  <div class="row m-0 pt-3 da-rev">
                    <div class="col-4 pl-md-0 chartbar-icon">
                      <i class="far fa-chart-bar c-icon i-red"></i>
                    </div>
                    <div class="col-8 pr-md-0">
                      <p>
                        Total Customer
                        <span>{{$customerCount}}</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 p-0">
                <div class="card-body card border-0">
                  <a href="" class="ml-auto da-filter"><i class="fas fa-filter"></i> Filter</a>
                  <div class="row m-0 pt-3 da-rev">
                    <div class="col-4 pl-md-0 chartbar-icon">
                      <i class="far fa-chart-bar c-icon i-blue"></i>
                    </div>
                    <div class="col-8 pr-md-0">
                      <p>
                        Total Order
                        <span>{{count($bookings)}}</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 col-md-4 p-0">
                <div class="d-b-title d-flex">
                  <h5>Pricing Bracket</h5>
                  <span class="ml-auto">
                    <a data-toggle="modal" data-target="#exampleModal" href="#" id="pricing-bracket"><i class="fas fa-pencil-alt"></i></a>
                  </span>
                </div>
                <div class="card-body card border-0 p-0 das-table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="br-l-15 pl-3">Lower</th>
                        <th>Upper</th>
                        <th>Cost</th>
                        <th class="br-r-15">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pb as $item)
                      <tr>
                        <td class="pl-3">{{$item->lower}} KM</td>
                        <td>{{$item->upper}} KM</td>
                        <td>Rs. {{$item->cost}}</td>
                        <td> <a href="{{route('dashboard.modal.delete', ['id'=>encrypt($item->id), 'modal_name'=>'pb'])}}"><i class="fas fa-trash"></i></a> </td>
                      </tr> 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <div class="d-b-title d-flex">
                  <h5>Rider Fee</h5>
                  <span class="ml-auto"><a data-toggle="modal" data-target="#exampleModal2" href="#" id="rider-fee"><i class="fas fa-pencil-alt"></i></a></span>
                </div>
                <div class="card-body card border-0 p-0 das-table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="br-l-15 pl-3">Lower</th>
                        <th>Upper</th>
                        <th>Cost</th>
                        <th class="br-r-15">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($rf as $item)
                      <tr>
                        <td class="pl-3">{{$item->lower}} KM</td>
                        <td>{{$item->upper}} KM</td>
                        <td>Rs. {{$item->cost}}</td>
                        <td> <a href="{{route('dashboard.modal.delete', ['id'=>encrypt($item->id), 'modal_name'=>'rf'])}}"><i class="fas fa-trash"></i></a> </td>
                      </tr> 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-12 col-md-4 p-0">
                <div class="d-b-title d-flex">
                  <h5>Incentive Bracket</h5>
                  <span class="ml-auto"><a data-toggle="modal" data-target="#exampleModal3" href="#" id="pricing-bracket"><i class="fas fa-pencil-alt"></i></a></span>
                </div>
                <div class="card-body card border-0 p-0 das-table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="br-l-15 pl-3">No. of Orders</th>
                        <th>Amount</th>
                        <th class="br-r-15">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($ib as $item)
                      <tr>
                        <td class="pl-3">{{$item->no_of_orders}} KM</td>
                        <td>Rs. {{$item->cost}}</td>
                        <td> <a href="{{route('dashboard.modal.delete', ['id'=>encrypt($item->id), 'modal_name'=>'ib'])}}"><i class="fas fa-trash"></i></a> </td>
                      </tr> 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div><!--dashboard-bodyleft-->

          {{-- modal 1 start --}}
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Pricing Bracket </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{route('dashboard.modal.store')}}" method="post">
                  @csrf
                  <div class="modal-body">
                    <input type="hidden" name="modal_name" value="pb">
                    <label for="lower">Lower</label>
                    <input type="number" placeholder="In Kilometer" class="form-control" name="lower" id="lower">
                    <label for="upper">Upper</label>
                    <input type="number" placeholder="In Kilometer" class="form-control" name="upper" id="upper">
                    <label for="cost">Cost</label>
                    <input type="number" placeholder="In Ruppess" class="form-control" name="cost" id="cost">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn order-btn" id="save-modal">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- modal 1 end --}}

          {{-- modal 2 start --}}
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Rider Fee </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{route('dashboard.modal.store')}}" method="post">
                  @csrf
                  <div class="modal-body">
                    <input type="hidden" name="modal_name" value="rf">

                    <label for="lower">Lower</label>
                    <input type="number" placeholder="In Kilometer" class="form-control" name="lower" id="lower">
                    <label for="upper">Upper</label>
                    <input type="number" placeholder="In Kilometer" class="form-control" name="upper" id="upper">
                    <label for="cost">Cost</label>
                    <input type="number" placeholder="In Ruppess" class="form-control" name="cost" id="cost">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn order-btn" id="save-modal">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- modal 2 end --}}

          {{-- modal 3 start --}}
          <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Incentive Bracket </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{route('dashboard.modal.store')}}" method="post">
                  @csrf
                  <div class="modal-body">
                    <input type="hidden" name="modal_name" value="ib">
                    <label for="upper">Orders</label>
                    <input type="number" placeholder="No of order" class="form-control" name="no_of_orders" id="no_of_orders">
                    <label for="cost">Cost</label>
                    <input type="number" placeholder="In Ruppess" class="form-control" name="cost" id="cost">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn order-btn" id="save-modal">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- modal 3 end --}}

          <div class="col-12 col-md-4 dashboard_b_right">
            <div class="card border-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Top 5 Customers</h5>
                
                @foreach ($customers as $customer)
                  <div class="d-flex order-text">
                    <div class="cu-img">{{ucfirst(substr($customer->customerDetail->name, 0, 1))}}</div>
                    <p>
                      {{$customer->customerDetail->name}}
                      <span>{{$customer->TotalCount}} Orders</span>
                    </p>
                    <div class="dropdown dropleft ml-auto pt-2">
                      <i class="fas fa-ellipsis-v icon-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </i>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
            <div class="card border-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Rider Ranking</h5>
                @php
                    $i = 1;
                @endphp
                @foreach ($drivers as $driver)
                  <div class="d-flex order-text">
                    <div class="cu-img rider-img">{{$i++}}</div>
                    <p>
                      {{$driver->rider->fname}}&nbsp; {{$driver->rider->lname}}
                      <span>{{$driver->TotalCount}} Rides</span>
                    </p>
                    <div class="dropdown dropleft ml-auto pt-2">
                      <i class="fas fa-ellipsis-v icon-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </i>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div><!--dashboard-bodyright-->
      </div>
  </div>
</main>
@endsection

@section('script')
    
<script>
  $('#delivery_status').click(function() {
      bookingDescription = $(this).val();
      bookingId = $('#bookingId').val();
      $.ajax({
        url: "{{route('change.delivery.status')}}",
        type: "POST",
        dataType:'JSON',
        data: { _token: '{{csrf_token()}}'  },
        success:function(data) {
          location.reload();
        }
      }) 
    })
</script>

@endsection