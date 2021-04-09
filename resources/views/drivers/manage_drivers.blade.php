@extends('ui.master')

@section('title')
    Manage Drivers
@endsection

@section('content')

<main>
  <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12 pl-2 pl-md-4">
          <div class="card border-0">
            <div class="card-body">
              <div class="row m-0 ">
                <h5 class="card-title col-8 p-0">Rider Database</h5>
              </div>
              <div class="row m-0">
                <div class="col-md-4 col-12 pl-2 pl-md-0">
                  <div class="row m-0">
                    <div class="card col-12 p-0 calender-card shadow-sm">
                      <div class="card-body p-0">
                        <div class="d-flex mb-3 p-2">
                          <h6 class="card-subtitle text-muted pt-2">Calender</h6>
                          <div class="form-group ml-auto mb-0">
                            <select class="form-control rider-datedrop">
                              <option>Jan, 2018</option>
                              <option>Feb, 2018</option>
                              <option>Mar, 2018</option>
                              <option>Apr, 2018</option>
                              <option>May, 2018</option>
                            </select>
                          </div>
                        </div>
                        <div class="calendar justify-text-center">
                          <table class="table">
                            <tr>
                              <th>S</th>
                              <th>M</th>
                              <th>T</th>
                              <th>W</th>
                              <th>T</th>
                              <th>F</th>
                              <th>S</th>
                            </tr>
                            <tr>
                              <td class="table-desible">31</td>
                              <td class="table-desible">30</td>
                              <td>1</td>
                              <td>2</td>
                              <td>3</td>
                              <td>4</td>
                              <td>5</td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>7</td>
                              <td>8</td>
                              <td>9</td>
                              <td class="table-active">10</td>
                              <td class="table-date-range">11</td>
                              <td class="table-date-range">12</td>
                            </tr>
                            <tr>
                              <td class="table-date-range">13</td>
                              <td class="table-date-range">14</td>
                              <td class="table-date-range">15</td>
                              <td class="table-date-range">16</td>
                              <td class="table-date-range">17</td>
                              <td class="table-date-range">18</td>
                              <td class="table-date-range">19</td>
                            </tr>
                            <tr>
                              <td class="table-date-range">20</td>
                              <td class="table-date-range">21</td>
                              <td class="table-active">22</td>
                              <td>23</td>
                              <td>24</td>
                              <td>25</td>
                              <td>26</td>
                            </tr>
                            <tr>
                              <td>27</td>
                              <td>28</td>
                              <td>29</td>
                              <td>30</td>
                              <td>31</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="calendar"></div>
                  </div>
                  <div class="row m-0 mt-3">
                    <div class="card col-12 p-0 rider-active-card shadow-sm">
                      <div class="card-body d-flex order-text p-2 m-0">
                        <div class="cu-img"><i class="fas fa-user"></i></div>
                        <p>Active Rider</p>
                        <h6 class=" ml-auto">24</h6>
                        <div class="dropdown dropleft ml-auto">
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
                    <div class="card col-12 p-0 rider-active-card shadow-sm">
                      <div class="card-body d-flex order-text p-2 m-0">
                        <div class="cu-img"><i class="fas fa-user"></i></div>
                        <p>Inactive Rider</p>
                        <h6 class=" ml-auto">12</h6>
                        <div class="dropdown dropleft ml-auto">
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
                    <div class="card col-12 p-0 rider-active-card shadow-sm">
                      <div class="card-body d-flex order-text p-2 m-0">
                        <div class="cu-img"><i class="fas fa-user"></i></div>
                        <p>Blockrd Rider</p>
                        <h6 class=" ml-auto">24</h6>
                        <div class="dropdown dropleft ml-auto">
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
                    <div class="card col-12 p-0 rider-active-card shadow-sm">
                      <div class="card-body d-flex order-text p-2 m-0">
                        <div class="cu-img"><i class="fas fa-map-marker-alt"></i></div>
                        <p>Locate Active Rider</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-12 pr-2 pr-md-0">
                  <div class="row m-0 mb-4">
                    <div class="col-md-6 col-7 p-0">
                      <div class="input-group ridersearch">
                        <input class="form-control border" type="text" placeholder="Search rider..." aria-label="Search" aria-describedby="basic-addon2" />
                        <div class="search-icon">
                            <i class="fas fa-search"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-5 text-right ml-auto filter-div">
                      <a href="#"><img src="{{asset('ui/img/export-icon.png')}}"> &nbsp; Export</a> &nbsp; &nbsp;
                      <a href="#"><i class="fas fa-filter"></i> &nbsp; Filter</a>
                    </div>
                  </div>
                  <div class="table-responsive rider-table">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th class="l-redious-15 pl-15">Sl.</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Mobile</th>
                          <th>Pan No</th>
                          <th>Edit</th>
                          <th class="r-redious-15">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $offercategories)
                          <tr>
                          <td>{{$i++}}</td>
                          <td>{{$offercategories->fname}}</td> 
                          <td>{{$offercategories->address}}</td>
                          <td>{{$offercategories->mobile}}</td> 
                          <td>{{$offercategories->pan_no}}</td>   
                          <td>
                              <a class="edit_driver"  href="{{route('edit_driver', encrypt($offercategories->id))}}" id=""><i class="fa fa-edit"></i></a>
                          </td>
                          <td>
                              <a class="delete_app" id="{{$offercategories->id}}"><i class="fa fa-trash" style="margin-left: 25px;"></i></a>
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
      </div>
  </div>
</main>
                
@csrf

@endsection

@section('script')
<script>
       
  $(document).ready(function (){
             
      // $(".edit_driver").click(function(){
      //     var app_id=this.id;
      //     var fd = {'app_id': app_id,'_token':$('input[name="_token"]').val()};
      //      redirectPost('edit_driver', fd);
      // });
      $(".delete_app").click(function(){
          if(confirm('Are you sure?')) {      
              var appdel_id=this.id;
              var fd = {'appdel_id': appdel_id,'_token':$('input[name="_token"]').val()};
              redirectPost('delete_driver', fd);
          }
      });
     
  });
  
      var redirectPost = function (url, data = null, method = 'post') {
          var form = document.createElement('form');
          form.method = method;
          form.action = url;
          for (var name in data) {
              var input = document.createElement('input');
              input.type = 'hidden';
              input.name = name;
              input.value = data[name];
              form.appendChild(input);
          }
          $('body').append(form);
          form.submit();
      }
               
  </script>
@endsection