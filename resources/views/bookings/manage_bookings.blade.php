<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Admin | Dashboard</title>

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
                                <h5>Manage Booking</h5>
                                @csrf
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-1" class="display">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($bookings as $booking)
                                            <tr>
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
                                                @if ($booking->is_delivered == 0)
                                                <div>
                                                    <strong class="text-danger">Not delivered</strong>
                                                </div>
                                                @else
                                                <div>
                                                    <strong class="text-success">Delivered</strong>
                                                </div>
                                                @endif
                                            </td>  
                                            <td>
                                                <a class="edit_vehicletype" href="{{route('admin.edit_bookings', ['id' => $booking->id])}}" title="Edit"><i class="fa fa-edit text-warning"></i></a>
                                                <a class="delete_app" href="{{route('admin.delete_bookings', ['id' => $booking->id])}}" title="Delete"><i class="fa fa-trash text-danger" style="margin-left: 25px;" onclick="return confirm('Are you sure?')"></i></a>
                                            </td>
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
    });    
</script>
@endsection