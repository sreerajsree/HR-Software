@extends('layouts.home')
@section('title')
    <title>Loan Requests | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Loan Requests</h1>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="example" style="width:100%">
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
                                    @foreach ($lreq as $req)
                                        <tr>
                                            <td>{{ $req->id }}</td>
                                            <td>{{ $req->name }}</td>
                                            <td>{{ $req->created_at->todatestring() }}</td>
                                            <td>{{ $req->loan_amount }}</td>
                                            <td>{{ $req->loan_tenure }}</td>
                                            <td>{{ $req->loan_purpose }}</td>
                                            <td>{{ $req->loan_emi }}</td>
                                            <td>
                                                @if ($req->request_status == 0)
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm text-white btn-warning dropdown-toggle"
                                                            type="button" data-coreui-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Pending
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="/loan-approve/{{ $req->id }}">Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="/loan-reject/{{ $req->id }}">Reject</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @elseif ($req->request_status == 1)
                                                    <button class="btn btn-sm btn-success text-white">Approved</button>
                                                @elseif ($req->request_status == 2)
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
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
