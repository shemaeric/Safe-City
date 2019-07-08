@extends('layouts')
@section('title')
    Urgent
@endsection
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
                            <h3 class="card-title">Urgent Reports</h3>
                        </div>
                        @if(count($urgent) < 1)
                            <h3 class="text-center my-3>No Urgent help requests available</h3>
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
                                @foreach($urgent as $index => $urgent)
                                    @section('urgent')
                                        <?php $i= 0; ?>
                                        @if($urgent->approved != 1)
                                            <span class="badge badge-danger" style="position: absolute;top:7px;right:29px;border-radius: 50%;">{{$i + 1}}</span>
                                        @endif
                                    @endsection
                                    <tr style =" background:{{$urgent->approved < 1 ?'rgba(255,153,102,0.2)':''}}">
                                        <td><span class="text-muted">{{$index + 1}}</span></td>
                                        <td><a href="invoice.html" class="text-inherit">{{$urgent->help_seeker->first_name}}</a></td>
                                        <td>
                                            {{$urgent->help_seeker->last_name}}
                                        </td>
                                        <td>
                                            {{$urgent->help_seeker->my_phone_number}}
                                        </td>
                                        <td>{{$urgent->help_seeker->referee_phone_number}}</td>
                                        <td><a href="{{$urgent->approved > 0 ? 'javascript:Void()':'approve/'.$urgent->id}}" class="btn {{$urgent->approved > 0 ?'btn-success':'btn-danger' }}">{{$urgent->approved > 0 ?'Approved':'Un Approved'}}</a></td>
                                        <td>
                                            <a href="{{url('details/'.$urgent->id)}}" class="btn btn-secondary btn-md" style="border-color: #014461;color:#014461;">View</a>
                                        </td>
                                    </tr>
                                @endforeach
{{--                                <tr>--}}
{{--                                    <td><span class="text-muted">001401</span></td>--}}
{{--                                    <td><a href="invoice.html" class="text-inherit">Joshua</a></td>--}}
{{--                                    <td>--}}
{{--                                        GAKWANDI--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        0787956621--}}
{{--                                    </td>--}}
{{--                                    <td>001401</td>--}}
{{--                                    <td class="text-right">--}}
{{--                                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm">View</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                </tbody>
                            </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection