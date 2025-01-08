@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Ticket')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Department') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Departments') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Add Ticket Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Branch') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
               

                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_foD6VvulHSpxKYjtgehkQ_UoVGHH64Y&callback=initMap&libraries=places,geometry"></script>
                <script>
                    function initMap() {
                            var latlng = new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("lon").value);
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: latlng,
                                zoom: 10,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map,
                                title: 'Set lat/lon values for this property',
                                draggable: true
                            });

                            // Try HTML5 geolocation.
                            if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                    var pos = {
                                        lat: position.coords.latitude,
                                        lng: position.coords.longitude
                                    };
                                    map.setCenter(pos);
                                    marker.setPosition(pos);
                                    document.getElementById("lat").value = pos.lat;
                                    document.getElementById("lon").value = pos.lng;
                                    }, function() {
                                    handleLocationError(true, map.getCenter());
                                    });
                            } else {
                                // Browser doesn't support Geolocation
                                handleLocationError(false, map.getCenter());
                            }

                            google.maps.event.addListener(marker, 'dragend', function(a) {
                            document.getElementById("lat").value = a.latLng.lat().toFixed(6);
                            document.getElementById("lon").value = a.latLng.lng().toFixed(6);
                            });
                    };
                </script>

            </div>
        </div>
    </div>
</div>

<!-- Script to display selected file name -->
<script>
    document.getElementById('attachment').addEventListener('change', function (e) {
        const fileName = e.target.files[0]?.name || '{{ __('No file chosen') }}';
        document.getElementById('attachmentFileName').textContent = fileName;
    });
</script>

<!-- Datepicker Script -->
<script>
    $(function () {
        $(".datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
</script>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
