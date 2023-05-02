@extends('layouts.home')
@section('title')
    <title>Documents Unsubmitted | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Documents Unsubmitted Employees</h1>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="unsubmitted" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Company Name</th>
                                        <th>Emp Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>shift</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unsubmitted as $req)
                                        <tr>
                                            <td>{{ $req->id }}</td>
                                            <td>{{ $req->companyname }}</td>l
                                            <td>{{ $req->emp_code }}</td>
                                            <td>{{ $req->name }}</td>
                                            <td>{{ $req->email }}</td>
                                            <td>{{ $req->shift }}</td>
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
            $('#unsubmitted').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
