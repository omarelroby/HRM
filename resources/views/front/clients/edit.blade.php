@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h5 class="mb-0">{{ __('Edit Client') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name (English) -->
                        <div class="form-group">
                            <label>{{ __('Name (English)') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
                        </div>

                        <!-- Name (Arabic) -->
                        <div class="form-group">
                            <label>{{ __('Name (Arabic)') }}</label>
                            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $client->name_ar) }}" required>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label>{{ __('Client Image') }}</label>
                            <input type="file" name="image" class="form-control">
                            @if($client->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/app/public/'.$client->image) }}" width="100" class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success my-2">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
