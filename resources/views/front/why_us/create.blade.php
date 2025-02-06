@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h1>{{  __('Create Why Us') }}</h1>
                </div>
                <div class="card-body">

    <form action="{{ route('why-us.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <!-- Name (English) -->
        <div class="form-group">
            <label>{{ __('Title (English)') }}</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $why->title ?? '') }}" required>
        </div>

        <!-- Name (Arabic) -->
        <div class="form-group">
            <label>{{ __('Title (Arabic)') }}</label>
            <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $why->title_ar ?? '') }}" required>
        </div>


        <button type="submit" class="btn btn-primary my-2">{{ __('Save') }}</button>
    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
