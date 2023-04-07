@extends('layouts.home')
@section('title')
    <title>All Loans | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <!--<div class="row">-->
            <!--    <div class="col-12">-->
            <!--        <div class="card p-3 mb-2">-->
            <!--            <h1>Pending Loans</h1>-->
            <!--        </div>-->
            <!--        <div class="card mb-5">-->
            <!--            <div class="card-body">-->
            <!--                <table class="table table-striped table-bordered" id="example1" style="width:100%">-->
            <!--                    <thead>-->
            <!--                        <tr>-->
            <!--                            <th>ID</th>-->
            <!--                            <th>Name</th>-->
            <!--                            <th>Requested Date</th>-->
            <!--                            <th>Loan Amount</th>-->
            <!--                            <th>Loan Tenure</th>-->
            <!--                            <th>Loan Purpose</th>-->
            <!--                            <th>Loan EMI</th>-->
            <!--                            <th>Status</th>-->
            <!--                        </tr>-->
            <!--                    </thead>-->
            <!--                    <tbody>-->
            <!--                        @foreach ($pendingloans as $pl)-->
            <!--                            <tr>-->
            <!--                                <td>{{ $pl->id }}</td>-->
            <!--                                <td>{{ $pl->name }}</td>-->
            <!--                                <td>{{ $pl->created_at->todatestring() }}</td>-->
            <!--                                <td>{{ $pl->loan_amount }}</td>-->
            <!--                                <td>{{ $pl->loan_tenure }}</td>-->
            <!--                                <td>{{ $pl->loan_purpose }}</td>-->
            <!--                                <td>{{ $pl->loan_emi }}</td>-->
            <!--                                <td>-->
            <!--                                    @if ($pl->request_status == 0)-->
            <!--                                        <div class="dropdown">-->
            <!--                                            <button class="btn btn-sm text-white btn-warning dropdown-toggle"-->
            <!--                                                type="button" data-coreui-toggle="dropdown"-->
            <!--                                                aria-expanded="false">-->
            <!--                                                Pending-->
            <!--                                            </button>-->
            <!--                                            <ul class="dropdown-menu">-->
            <!--                                                <li><a class="dropdown-item"-->
            <!--                                                        href="/loan-approve/{{ $pl->id }}">Approve</a>-->
            <!--                                                </li>-->
            <!--                                                <li><a class="dropdown-item"-->
            <!--                                                        href="/loan-reject/{{ $pl->id }}">Reject</a>-->
            <!--                                                </li>-->
            <!--                                            </ul>-->
            <!--                                        </div>-->
            <!--                                    @elseif ($pl->request_tatus == 1)-->
            <!--                                        <button class="btn btn-sm btn-success text-white">Approved</button>-->
            <!--                                    @elseif ($pl->request_status == 2)-->
            <!--                                        <button class="btn btn-sm btn-danger text-white">Rejected</button>-->
            <!--                                    @endif-->
            <!--                                </td>-->
            <!--                            </tr>-->
            <!--                        @endforeach-->
            <!--                    </tbody>-->
            <!--                </table>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-2">
                        <h1>Approved Loans</h1>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="example2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Requested Date</th>
                                        <th>Loan Amount</th>
                                        <th>Loan Tenure</th>
                                        <th>Loan Purpose</th>
                                        <th>Loan EMI</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvedloans as $al)
                                        <tr>
                                            <td>{{ $al->id }}</td>
                                            <td>{{ $al->name }}</td>
                                            <td>{{ $al->created_at->todatestring() }}</td>
                                            <td>{{ $al->loan_amount }}</td>
                                            <td>{{ $al->loan_tenure }}</td>
                                            <td>{{ $al->loan_purpose }}</td>
                                            <td>{{ $al->loan_emi }}</td>
                                            <td>
                                                @if ($al->request_status == 0)
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm text-white btn-warning dropdown-toggle"
                                                            type="button" data-coreui-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Pending
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="/loan-approve/{{ $al->id }}">Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="/loan-reject/{{ $al->id }}">Reject</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @elseif ($al->request_status == 1)
                                                    <button class="btn btn-sm btn-success text-white">Approved</button>
                                                @elseif ($al->request_status == 2)
                                                    <button class="btn btn-sm btn-danger text-white">Rejected</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-2">
                        <h1>Rejected Loans</h1>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="example3" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Requested Date</th>
                                        <th>Loan Amount</th>
                                        <th>Loan Tenure</th>
                                        <th>Loan Purpose</th>
                                        <th>Loan EMI</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedloans as $rl)
                                        <tr>
                                            <td>{{ $rl->id }}</td>
                                            <td>{{ $rl->name }}</td>
                                            <td>{{ $rl->created_at->todatestring() }}</td>
                                            <td>{{ $rl->loan_amount }}</td>
                                            <td>{{ $rl->loan_tenure }}</td>
                                            <td>{{ $rl->loan_purpose }}</td>
                                            <td>{{ $rl->loan_emi }}</td>
                                            <td>
                                                @if ($rl->request_status == 0)
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm text-white btn-warning dropdown-toggle"
                                                            type="button" data-coreui-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Pending
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="/loan-approve/{{ $rl->id }}">Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="/loan-reject/{{ $rl->id }}">Reject</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @elseif ($rl->request_tatus == 1)
                                                    <button class="btn btn-sm btn-success text-white">Approved</button>
                                                @elseif ($rl->request_status == 2)
                                                    <button class="btn btn-sm btn-danger text-white">Rejected</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                responsive: true
            });
        });
        $(document).ready(function() {
            $('#example2').DataTable({
                responsive: true
            });
        });
        $(document).ready(function() {
            $('#example3').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
