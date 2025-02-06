@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-3">
            <a href="{{ route('why-us.create') }}" class="btn btn-primary mb-3">{{ __('Add New why us') }}</a>

        </div>

        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h5 class="mb-0">{{ __('Why Choose Us') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>

                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Name (Arabic)') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($why_us as $why)
                            <tr>

                                <td>{{ $why->title }}</td>
                                <td>{{ $why->title_ar }}</td>
                                <td>
                                    <a href="{{ route('why-us.edit', $why->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('why-us.destroy', $why->id) }}" method="POST" style="display:inline">
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
                        {{ $why_us->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
