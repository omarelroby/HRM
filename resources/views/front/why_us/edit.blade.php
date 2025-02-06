@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h5 class="mb-0">{{ __('Edit Why Us') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('why-us.update', $whyUs->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name (English) -->
                        <div class="form-group">
                            <label>{{ __('Title (English)') }}</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $whyUs->title) }}" required>
                        </div>

                        <!-- Name (Arabic) -->
                        <div class="form-group">
                            <label>{{ __('Title (Arabic)') }}</label>
                            <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $whyUs->title_ar) }}" required>
                        </div>


                        <button type="submit" class="btn btn-success my-2">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
