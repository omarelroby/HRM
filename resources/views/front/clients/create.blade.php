@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h1>{{ isset($client) ? __('Edit Client') : __('Create Client') }}</h1>
                </div>
                <div class="card-body">

    <form action="{{ isset($client) ? route('clients.update', $client) : route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($client))
            @method('PUT')
        @endif

        <!-- Name (English) -->
        <div class="form-group">
            <label>{{ __('Name (English)') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $client->name ?? '') }}" required>
        </div>

        <!-- Name (Arabic) -->
        <div class="form-group">
            <label>{{ __('Name (Arabic)') }}</label>
            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $client->name_ar ?? '') }}" required>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label>{{ __('Client Image') }}</label>
            <input type="file" name="image" class="form-control">
            @if(isset($client) && $client->image)
                <img src="{{ asset('storage/'.$client->image) }}" width="100" class="mt-2 img-thumbnail">
            @endif
        </div>

        <button type="submit" class="btn btn-primary my-2">{{ __('Save') }}</button>
    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
