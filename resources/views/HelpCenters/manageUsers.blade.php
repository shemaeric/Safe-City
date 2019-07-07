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
                            <h3 class="card-title mr-auto">Manage users</h3>

                            <ul class="nav nav-pills" id="rowTab">
                                <li class="nav-item">
                                    <a href="#home" data-toggle="tab" aria-expanded="true" class="btn mr-2 active" style="background:#256589;color:#fff;">
                                        Unactivated
                                    </a>
                                    @if(count($notActive) > 0)
                                        <span class="badge badge-danger" style="position: relative;bottom:10px;right:27px;border-radius: 50%;">{{count($notActive)}}</span>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    <a href="#profile" data-toggle="tab" aria-expanded="false" class="btn mr-2 btn-white">Activated</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false" class="btn mr-2 btn-white">Block</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    @if(count($notActive) < 1)
                                        <h3 class="text-danger text-center">No help center available to activate</h3>

                                    @else
                                        @if (session('message'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>E-mail</th>
                                                    <th>Address</th>
                                                    <th>Activate</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($notActive as $index => $notActive)
                                                        <tr>
                                                            <td>{{$index + 1}}</td>
                                                            <td>{{$notActive->name}}</td>
                                                            <td>{{$notActive->phone_number}}</td>
                                                            <td>{{$notActive->email}}</td>
                                                            <td>{{$notActive->address}}</td>
                                                            <td><a href="{{url('/activate/'.$notActive->id)}}" class="btn btn-success btn-sm">Activate</a></td>
                                                        </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane" id="profile">
                                    @if(count($active) < 1)
                                        <h3 class="text-danger text-center">No activated help center</h3>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table card-table table-vcenter text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th class="w-1">No.</th>
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>E-mail</th>
                                                    <th>Address</th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                @foreach($active as $index => $active)
                                                        <tr>
                                                            <td>{{$index + 1}}</td>
                                                            <td>{{$active->name}}</td>
                                                            <td>{{$active->phone_number}}</td>
                                                            <td>{{$active->email}}</td>
                                                            <td>{{$active->address}}</td>
                                                        </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane" id="settings">
                                    @if(count($isBlocked) < 1)
                                        <h3 class="text-success text-center">No blocked help center</h3>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table card-table table-vcenter text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th class="w-1">No.</th>
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>E-mail</th>
                                                    <th>Address</th>
                                                    <th>status</th>
                                                    <th>UnBlock</th>
                                                </tr>
                                                </thead>
                                                <tbody>



                                                @foreach($isBlocked as $index => $isBlocked)

                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>{{$isBlocked->name}}</td>
                                                        <td>{{$isBlocked->phone_number}}</td>
                                                        <td>{{$isBlocked->email}}</td>
                                                        <td>{{$isBlocked->address}}</td>
                                                        <td><span class="{{ $isBlocked->is_blocked > 0 ?'text-danger':'text-success'}}">{{ $isBlocked->is_blocked > 0 ?'Blocked':'Not Blocked'}}</span></td>
                                                        <td><a href="{{url('blocked/'.$isBlocked->id)}}" class="btn {{ $isBlocked->is_blocked > 0 ?'btn-success':'btn-danger'}} btn-sm">{{ $isBlocked->is_blocked > 0 ?'Unblock':'Block'}}</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#rowTab a:first').tab('show');
        });
    </script>
@endpush