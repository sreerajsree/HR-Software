<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="HR Software">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="/css/vendors/simplebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    @yield('styles')
    <link href="/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

</head>

<body>
    @php
    use Carbon\Carbon;
    $attendance = Session::get('attendance');
    $totalHours = Carbon::parse($attendance->time_out)
    ->diff(Carbon::parse($attendance->time_in))
    ->format('%H:%I:%S');
    $noLogout = Carbon::parse(now('Asia/Kolkata'))
    ->diff(Carbon::parse($attendance->time_in))
    ->format('%H:%I:%S');
    $attendance->time_in;
    $start = new Carbon($attendance->time_in);
    $end = new Carbon(now('America/Los_Angeles')->format('g:i A'));
    $noLogoutUS = $start->diff($end)->format('%H:%I:%S');
    @endphp
    @include('includes.sidebar')
    @include('includes.topbar')
    @include('includes.timeout-modal')
    @include('sweetalert::alert')
    @yield('content')

    <footer class="footer">
        <div>©
            <?php echo date('Y'); ?> Apsensys Technologies.
        </div>
        <div class="ms-auto">Powered by <a href="mailto:online@thesiliconreview.com" class="text-primary"
                style="text-decoration: none;">Development Team</a></div>
    </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/vendors/coreui.bundle.min.js"></script>
    <script src="/vendors/simplebar/js/simplebar.min.js"></script>
    <script src="/vendors/chart.js/js/chart.min.js"></script>
    <script src="/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-timezone@0.5.43/moment-timezone.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.31/moment-timezone-with-data.js"></script>
    @yield('scripts')
    @yield('scripts1')
    @yield('scripts2')
    @yield('scripts3')
    <script type="text/javascript">
        setInterval(function() {
            var cTime = moment().format('MMMM Do YYYY, h:mm:ss A');
            $('#cTime').html(cTime);
        }, 1000);

        setInterval(function() {
            var cTimeUS = moment().tz("America/Los_Angeles").format('MMMM Do YYYY, h:mm:ss A');
            $('#cTimeUS').html(cTimeUS);
        }, 1000);

        var Day = moment().format('dddd');
        $('#Day').html(Day);
        setInterval(function() {
            var currentTime = moment().format('h:mm:ss A');
            $('#currentTime').html(currentTime);
        }, 1000);
        setInterval(function() {
            var currentTimeUS = moment().tz("America/Los_Angeles").format('h:mm:ss A');
            $('#currentTimeUS').html(currentTimeUS);
        }, 1000);

    </script>

</body>

</html>