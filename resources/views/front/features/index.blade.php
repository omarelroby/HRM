@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-3">
            <a href="{{ route('features.create') }}" class="btn btn-primary mb-3">{{ __('Add New Feature') }}</a>

        </div>

        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h5 class="mb-0">{{ __('Features List') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>{{ __('Icon') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Title (Arabic)') }}</th>

                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($features as $feature)
                            <tr>
                                <td>
                                    @if($feature->icon)
                                        <img src="{{ asset('storage/app/public/'.$feature->icon) }}" width="100">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $feature->title }}</td>
                                <td>{{ $feature->title_ar }}</td>
                                <td>
                                    <a href="{{ route('features.edit', $feature) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('features.destroy', $feature) }}" method="POST" style="display:inline">
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
                        {{ $features->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
