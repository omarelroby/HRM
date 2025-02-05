@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <a href="{{ route('home-sections.create') }}" class="btn btn-primary">Add New Section</a>

        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update About Us') }}</h5>
                </div>
                <div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Arabic Title</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($homeSections as $section)
            <tr>
                <td>{{ $section->title }}</td>
                <td>{{ $section->title_ar }}</td>
                <td>
                    @if($section->image)
                        <img src="{{ asset('storage/app/public/'.$homeSection->image) }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('home-sections.show', $section) }}" class="btn btn-info">View</a>
                    <a href="{{ route('home-sections.edit', $section) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('home-sections.destroy', $section) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
