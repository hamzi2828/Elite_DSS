@extends('admin.layout.app')
@section('customer-active')
    active
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Image') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            {{-- <th scope="col">{{ __('Action') }}</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img class="lazyload"
                                        src="{{ asset('storage/users/'. $customer->image) }}"
                                        alt="Custome Image" width="50" height="50">
                                </td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                {{-- <td>
                                    <a href="{{ route('admin.authors.edit', $customer->id) }}" class="edit-icon"
                                        title="{{ __('Edit') }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection