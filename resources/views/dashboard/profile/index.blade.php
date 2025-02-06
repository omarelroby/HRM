@extends('dashboard.layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Profile') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="text-center mb-4">
                            <!-- Display User Avatar -->
                            <div class="avatar avatar-xxl">
                                @if(Storage::exists('uploads/logo/' . $user->id . '_logo.png'))
                                    <img src="{{ asset('uploads/logo/' . $user->id . '_logo.png') }}" alt="Avatar" class="img-fluid rounded-circle">
                                @elseif($user->avatar)
                                    <img src="{{ asset(Storage::url($user->avatar)) }}" alt="Avatar" class="img-fluid rounded-circle">
                                @else
                                    <img src="{{ asset(Storage::url('uploads/avatar/company.png')) }}" alt="Avatar" class="img-fluid rounded-circle">
                                @endif
                            </div>
                            <h3 class="mt-3">{{ $user->name }}</h3>
                            <p class="text-muted">{{ $user->email }}</p>
                        </div>

                        <!-- Profile Details -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Fields (if any) -->
                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" class="form-control" id="phone" value="{{ $user->phone ?? 'N/A' }}" readonly>
                        </div>

                        <!-- Edit Profile Button -->
                        <div class="text-center mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                                <i class="ti ti-edit me-1"></i>{{ __('Edit Profile') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
