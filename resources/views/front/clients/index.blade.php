@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-3">
            <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">{{ __('Add New Client Image') }}</a>

        </div>

        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h5 class="mb-0">{{ __('Clients List') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Name (Arabic)') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>
                                    @if($client->image)
                                        <img src="{{ asset('storage/app/public/'.$client->image) }}" width="100">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->name_ar }}</td>
                                <td>
                                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
