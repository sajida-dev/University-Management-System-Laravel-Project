<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Google Maps Plugin -->
<script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>


{{-- <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script> --}}

<script>
    function showNotification(type, message) {
        $.notify(message, {
            type: type, // 'success' or 'danger'
            placement: {
                from: 'top', // Position from top or bottom
                align: 'center' // Position alignment
            },
            time: 1000, // Duration of the notification
            delay: 0 // Delay before the notification appears
        });
    }




    $(document).ready(function() {

        $('#country').change(function() {
            var countryCode = $(this).val();
            $('#province').empty().append(
                '<option value="">Select a Province</option>'); // Clear provinces
            $('#city').empty().append('<option value="">Select a City</option>'); // Clear cities

            if (countryCode) {
                $.ajax({
                    url: '/get-provinces',
                    type: 'GET',
                    data: {
                        country_code: countryCode
                    },
                    success: function(data) {
                        $.each(data, function(index, province) {
                            $('#province').append(
                                '<option value="' + province
                                .adminCode1 + '">' +
                                province.adminName1 +
                                '</option>');
                        });
                    }
                });
            }
        });

        $('#province').change(function() {
            var provinceCode = $(this).val();
            $('#city').empty().append('<option value="">Select a City</option>'); // Clear cities

            if (provinceCode) {
                $.ajax({
                    url: '/get-cities',
                    type: 'GET',
                    data: {
                        province_code: provinceCode
                    },
                    success: function(data) {
                        $.each(data.geonames, function(index, city) {
                            $('#city').append(
                                '<option value="' + city.geonameId +
                                '">' +
                                city.name + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
