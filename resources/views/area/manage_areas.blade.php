@extends('ui.master')

@section('title')
    Manage Arae
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
                            <th>Area Name</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $offercategories)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$offercategories->name}}</td> 
                            <td>{{$offercategories->lat}}</td>  
                            <td>{{$offercategories->lon}}</td> 
                            <td><a class="edit_areas" href="{{route('edit_areas', encrypt($offercategories->id))}}" id=""><i class="fa fa-edit"></i></a></td>
                            <td><a class="delete_app" id="{{$offercategories->id}}"><i class="fa fa-trash" style="margin-left: 25px;"></i></a></td>
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

@csrf

<script>
       
$(document).ready(function (){

    $(".edit_areas").click(function(){
        var app_id=this.id;
        var fd = {'app_id': app_id,'_token':$('input[name="_token"]').val()};
        redirectPost('edit_areas', fd);
    });
    $(".delete_app").click(function(){
        if (confirm('Are you sure?')) {
            var appdel_id=this.id;
            var fd = {'appdel_id': appdel_id,'_token':$('input[name="_token"]').val()};
            redirectPost('delete_areas', fd);
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
