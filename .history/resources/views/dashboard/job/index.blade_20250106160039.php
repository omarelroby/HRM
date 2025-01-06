@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
c
@endsection

@section('script')
<script>

    $(function () {
        $(".gregorian-date, .datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
</script>
@endsection
