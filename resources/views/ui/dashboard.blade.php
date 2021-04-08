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
                      <a href="" class="tuggle-btn">
                        <i class="fas fa-toggle-on"></i>
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
                        <span>Rs. {{$revenue}}</span>
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
                        <span>48</span>
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
                        <span>{{$bookings}}</span>
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
                  <span class="ml-auto"><a href=""><i class="fas fa-pencil-alt"></i></a></span>
                </div>
                <div class="card-body card border-0 p-0 das-table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="br-l-15 pl-3">Lower</th>
                        <th>Upper</th>
                        <th class="br-r-15">Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <div class="d-b-title d-flex">
                  <h5>Rider Fee</h5>
                  <span class="ml-auto"><a href=""><i class="fas fa-pencil-alt"></i></a></span>
                </div>
                <div class="card-body card border-0 p-0 das-table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="br-l-15 pl-3">Lower</th>
                        <th>Upper</th>
                        <th class="br-r-15">Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">0 KM</td>
                        <td>3 KM</td>
                        <td>Rs. 0</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-12 col-md-4 p-0">
                <div class="d-b-title d-flex">
                  <h5>Incentive Bracket</h5>
                  <span class="ml-auto"><a href=""><i class="fas fa-pencil-alt"></i></a></span>
                </div>
                <div class="card-body card border-0 p-0 das-table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="br-l-15 pl-3">No. of Orders</th>
                        <th class="br-r-15">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="pl-3">03</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">04</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">05</td>
                        <td>Rs. 0</td>
                      </tr>
                      <tr>
                        <td class="pl-3">06</td>
                        <td>Rs. 0</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div><!--dashboard-bodyleft-->

          <div class="col-12 col-md-4 dashboard_b_right">
            <div class="card border-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Top 5 Customers</h5>
                <div class="d-flex order-text">
                  <div class="cu-img">C</div>
                  <p>Cook Your Own Dish<span>29 Orders</span></p>
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
                <div class="d-flex order-text">
                  <div class="cu-img">T</div>
                  <p>Cook Your Own Dish<span>29 Orders</span></p>
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
                <div class="d-flex order-text">
                  <div class="cu-img">D</div>
                  <p>Cook Your Own Dish<span>29 Orders</span></p>
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
                <div class="d-flex order-text">
                  <div class="cu-img">F</div>
                  <p>Cook Your Own Dish<span>29 Orders</span></p>
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
                      {{$driver->fname}}&nbsp; {{$driver->lname}}
                      <span>+91&nbsp;{{$driver->mobile}}</span>
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
      