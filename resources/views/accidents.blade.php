@extends('layouts')
@section('content')
    <div class="col-lg-11 col-md-10">
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="page-title">
                    Dashboard
                </h1>
            </div>
            <div class="row row-cards row-deck">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Accidents Reports</h3>
                        </div>
                        @if(count($details) < 1)
                            <h3 class="text-center my-3>No Accidents help requests available</h3>
                        @else
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show col-md-10 mx-auto my-2" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Phone No.</th>
                                        <th>Referee No.</th>
                                        <th>Approve</th>
                                        <th>View</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($details as $index => $details)
                                    @section('accident')
                                        <?php $i= 0; ?>
                                        @if($details->approved != 1)
                                            <span class="badge badge-danger" style="position: absolute;top:7px;right:29px;border-radius: 50%;">{{$i + 1}}</span>
                                        @endif
                                    @endsection
                                        <tr style =" background:{{$details->approved < 1 ?'rgba(255,153,102,0.2)':''}}">
                                            <td><span class="text-muted">{{$index + 1}}</span></td>
                                            <td><a href="invoice.html" class="text-inherit">{{$details->help_seeker->first_name}}</a></td>
                                            <td>
                                                {{$details->help_seeker->last_name}}
                                            </td>
                                            <td>
                                                {{$details->help_seeker->my_phone_number}}
                                            </td>
                                            <td>{{$details->help_seeker->referee_phone_number}}</td>
                                            <td><a href="{{$details->approved > 0 ? 'javascript:Void()':'approve/'.$details->id}}" class="btn {{$details->approved > 0 ?'btn-success':'btn-danger' }}">{{$details->approved > 0 ?'Approved':'Un Approved'}}</a></td>
                                            <td>
                                                <a href="{{url('details/'.$details->id)}}" class="btn btn-secondary btn-md" style="border-color: #014461;color:#014461;">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection