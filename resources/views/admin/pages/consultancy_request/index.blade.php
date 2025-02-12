@extends('admin.layout.app')
@section('consultancy-active')
    active
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Consultancy Requests</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Phone') }}</th>
                            <th scope="col">{{ __('Message') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$consultancyRequests as $consultancyRequest)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $consultancyRequest->name }}</td>
                                <td>{{ $consultancyRequest->email }}</td>
                                <td>{{ $consultancyRequest->phone }}</td>
                                <td>{{ $consultancyRequest->message }}</td>
                                <td>
                                    <span class="font-weight-bold {{ $consultancyRequest->status ? 'text-success' : 'text-warning' }}">
                                        {{ $consultancyRequest->status ? 'Completed' : 'Pending' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection