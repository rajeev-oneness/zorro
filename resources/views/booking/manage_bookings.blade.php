<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Admin | Manage Booking</title>

    @extends('layouts.master')
    @section('content')

        <!-- Sidebar End -->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!--Zero Configuration  Starts -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Manage Bookings</h5>
                                @csrf
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-1" class="display">
                                        <thead>
                                        <tr>
                                            <th>From Name</th>
                                            <th>From Landmark</th>
                                            <th>From Mobile</th>
                                            <th>To Name</th>
                                            <th>To Landmark</th>
                                            <th>To Mobile</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
  @foreach ($categoriesbook as $offercategories)
    <tr>
    <td>{{$offercategories->from_name}}</td> 
    <td>{{$offercategories->from_landmark}}</td>
    <td>{{$offercategories->from_mobile}}</td> 
    <td>{{$offercategories->to_name}}</td>
    <td>{{$offercategories->to_landmark}}</td> 
    <td>{{$offercategories->to_mobile}}</td>
    <td>{{$offercategories->description}}</td>   
    <td><a class="edit_booking" id="{{$offercategories->id}}"><i class="fa fa-edit"></i></a><a class="delete_app" id="{{$offercategories->id}}"><i class="fa fa-trash" style="margin-left: 25px;"></i></a></td>
  </tr>
@endforeach
</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Zero Configuration  Ends -->



                </div>
            </div>
        </div>
    </div>
</div>
<script>
       
               $(document).ready(function (){
                   
                $('.display').DataTable({
      'order':[]
    });


    
    $(".edit_booking").click(function(){
     
        var app_id=this.id;
               var fd = {'app_id': app_id,'_token':$('input[name="_token"]').val()};
                    redirectPost('edit_booking', fd);
            });
            $(".delete_app").click(function(){
               
        var appdel_id=this.id;
               var fd = {'appdel_id': appdel_id,'_token':$('input[name="_token"]').val()};
                    redirectPost('delete_booking', fd);
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