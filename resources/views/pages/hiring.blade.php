@extends('layouts.home')
@section('title')
    <title>Hiring | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Hiring</h1>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <button class="btn btn-primary mb-5" data-coreui-toggle="modal"
                                data-coreui-target="#candidateModal">Add Candidate</button>
                            <div class="modal fade" id="candidateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Candidate</h5>
                                            <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('add.candidate') }}">
                                                @csrf
                                                <div class="input-group mb-3"><span class="input-group-text">
                                                        <svg class="icon">
                                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user">
                                                            </use>
                                                        </svg></span>
                                                    <input placeholder="Name" id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group mb-3"><span class="input-group-text">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-envelope-open">
                                                            </use>
                                                        </svg></span>
                                                    <input placeholder="Email" id="email" type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group mb-3"><span class="input-group-text">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-phone">
                                                            </use>
                                                        </svg></span>
                                                    <input placeholder="Contact" id="contact" type="number"
                                                        class="form-control @error('contact') is-invalid @enderror"
                                                        name="contact" value="{{ old('contact') }}" required
                                                        autocomplete="contact">
                                                    @error('contact')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group mb-3"><span class="input-group-text">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-soccer">
                                                            </use>
                                                        </svg></span>
                                                    <input placeholder="Skills" id="skills" type="text"
                                                        class="form-control @error('skills') is-invalid @enderror"
                                                        name="skills" value="{{ old('skills') }}" required
                                                        autocomplete="skills">
                                                    @error('skills')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group mb-3"><span class="input-group-text">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-comment-bubble">
                                                            </use>
                                                        </svg></span>
                                                    <input placeholder="Comments" id="comments" type="text"
                                                        class="form-control @error('comments') is-invalid @enderror"
                                                        name="skills" value="{{ old('comments') }}" required
                                                        autocomplete="comments">
                                                    @error('comments')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <button class="btn btn-block btn-success text-white" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Calls and Schedules</th>
                                        <th>Scheduled Candidate</th>
                                        <th>Selected / Rejected Candidate</th>
                                        <th>Joined</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($lreq as $req)
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
                                    @endforeach --}}
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
