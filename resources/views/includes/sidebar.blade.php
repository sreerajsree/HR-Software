@php
    use Carbon\Carbon;
    $attendance = Session::get('attendance');
    $totalHours = Carbon::parse($attendance->time_out)
        ->diff(Carbon::parse($attendance->time_in))
        ->format('%H:%I:%S');
    $noLogout = Carbon::parse(\now())
        ->diff(Carbon::parse($attendance->time_in))
        ->format('%H:%I:%S');
@endphp

<div class="sidebar sidebar-dark sidebar-fixed justify-content-between" id="sidebar">
    <div>
        <div class="sidebar-brand d-none d-md-flex">
            <img class="logo" src="/assets/img/apsensys.png" alt="">
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link @if (Auth::user()->add_status == 0) disabled @endif" href="/home">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard</a>
            </li>

            @if (Auth::user()->status == 0)
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-industry"></use>
                        </svg> Companies</a>
                    <ul class="nav-group-items">
                        <li class="nav-item"><a class="nav-link" href="/Apsensys/employees"><span
                                    class="nav-icon"></span>
                                Apsensys</a></li>
                        <li class="nav-item"><a class="nav-link" href="/The-Silicon-Review/employees"><span
                                    class="nav-icon"></span>
                                The Silicon Review</a></li>
                        <li class="nav-item"><a class="nav-link" href="/CIO-Bulletin/employees"><span
                                    class="nav-icon"></span>
                                CIO Bulletin</a></li>
                    </ul>
                </li>
            @endif

            <li class="nav-group"><a class="nav-link nav-group-toggle @if (Auth::user()->add_status == 0) disabled @endif"
                    href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> Attendance</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="{{ route('attendance') }}">View Attendance</a></li>
                    @if (Auth::user()->status == 0)
                        <li class="nav-item"><a class="nav-link" href="{{ route('userattendance') }}">User Attendance
                                Record</a></li>
                    @endif
                </ul>
            </li>

            <li class="nav-group"><a class="nav-link nav-group-toggle @if (Auth::user()->add_status == 0) disabled @endif"
                    href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-calendar-check"></use>
                    </svg> Leave</a>
                <ul class="nav-group-items">
                    @if (Auth::user()->status != 0 && Auth::user()->emp_status != 'Training')
                        <li class="nav-item"><a class="nav-link" href="{{ route('leave') }}">Apply for Leave</a></li>
                    @endif

                    @if (Auth::user()->status == 0)
                        <li class="nav-item"><a class="nav-link" href="{{ route('leave.applications') }}">Leave
                                Applications</a></li>
                    @endif
                    @if (Auth::user()->status != 0 && Auth::user()->emp_status == 'Training')
                        <li class="nav-item"><a class="nav-link" href="{{ route('trainees.leave') }}">Apply for
                                Leave</a></li>
                    @endif
                </ul>
            </li>

            <li class="nav-item"><a class="nav-link @if (Auth::user()->add_status == 0) disabled @endif"
                    href="{{ route('holidays') }}">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-flight-takeoff"></use>
                    </svg>Holidays</a>
            </li>

            <li class="nav-item"><a class="nav-link @if (Auth::user()->add_status == 0) disabled @endif"
                    href="{{ route('gallery') }}">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-camera"></use>
                    </svg> Gallery</a>
            </li>
            @if (Auth::user()->status == 0)
                <li class="nav-group @if (Auth::user()->emp_status == 'Training') disabled @endif"><a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-calendar-check"></use>
                        </svg> Payrolls</a>
                    <ul class="nav-group-items">
                        <ul class="nav-group-items">
                            <li class="nav-item"><a class="nav-link" href="{{ route('payroll.view') }}">
                                    Payrolls View</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('payroll.requests') }}">
                                    Payrolls Requests</a></li>
                        </ul>
                    </ul>
                </li>
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                        </svg> Loans</a>
                    <ul class="nav-group-items">
                        <ul class="nav-group-items">
                            <li class="nav-item"><a class="nav-link" href="{{ route('all.loans') }}">
                                    All Loans</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('loan.requests') }}">
                                    Loan Requests</a></li>
                        </ul>
                    </ul>
                </li>
                {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-gift"></use>
                        </svg> Hike</a>
                    <ul class="nav-group-items">
                        <ul class="nav-group-items">
                            <li class="nav-item"><a class="nav-link" href="{{ route('hike.index') }}">
                                    All Hikes</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('add.hike') }}">
                                    Add Hike</a></li>
                        </ul>
                    </ul>
                </li> --}}
            @endif
            @if (Auth::user()->status != 0)
                <li class="nav-item"><a class="nav-link @if (Auth::user()->add_status == 0) disabled @endif @if(Auth::user()->emp_status == 'Training') disabled @endif"
                        href="{{ route('payroll.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-calendar-check"></use>
                        </svg> Payroll</a>
                </li>
                <li class="nav-item"><a class="nav-link @if (Auth::user()->add_status == 0) disabled @endif @if(Auth::user()->emp_status == 'Training') disabled @endif"
                        href="{{ route('loan.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                        </svg> Loans</a>
                </li>
            @endif
            <li class="nav-item"><a class="nav-link @if (Auth::user()->add_status == 0) disabled @endif"
                    href="{{ route('viewpolicy') }}">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
                    </svg> Company Policy</a>
            </li>

            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-folder-open"></use>
                    </svg> Documentation</a>
                <ul class="nav-group-items">
                    @if (Auth::user()->add_status == 0)
                        <li class="nav-item"><a class="nav-link" href="{{ route('add') }}">Add Personal Details</a>
                        </li>
                    @endif
                    @if (Auth::user()->add_status == 1)
                        <li class="nav-item"><a class="nav-link" href="{{ route('documents') }}">Upload
                                Documents</a>
                        </li>
                    @endif
                    @if (Auth::user()->status == 0)
                        <li class="nav-item"><a class="nav-link" href="{{ route('view.documents') }}">View
                                Documents</a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
    <div>
        <div class="px-3">
            <table class="table" style="font-size: 13px;">
                <tr>
                    <th><svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clock"></use>
                        </svg> Current Time</th>
                    <td>
                        <div id="currentTime"></div>
                    </td>
                </tr>
                <tr>
                    <th><svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clock"></use>
                        </svg> Login Time</th>
                    <td>{{ Carbon::parse($attendance->time_in)->format('g:i:s A') }}</td>
                </tr>
                <tr>
                    <th><svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clock"></use>
                        </svg> Logout Time</th>
                    <td>
                        @if ($attendance->time_out == '00:00:00')
                            {{ $attendance->time_out }}
                        @else
                            {{ Carbon::parse($attendance->time_out)->format('g:i:s A') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-av-timer"></use>
                        </svg> Total Hours</th>
                    <td>
                        @if ($attendance->time_out == '00:00:00')
                            {{ $noLogout }} Hrs
                        @else
                            {{ $totalHours }} Hrs
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <button class="btn btn-primary login-btn w-100 py-3 fw-bold @if ($attendance->time_out != '00:00:00') disabled @endif"
            data-coreui-toggle="modal" data-coreui-target="#timeOutModal">TIME OUT</button>
    </div>
</div>
