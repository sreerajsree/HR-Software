@extends('layouts.home')
@section('title')
    <title>
        Hiring | HR-Soft</title>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div id="nav-tab" role="tablist">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <a class="nav-link active" id="nav-calls-schedules-tab" data-coreui-toggle="tab"
                                    data-coreui-target="#nav-calls-schedules" type="button" role="tab"
                                    aria-controls="nav-calls-schedules" aria-selected="true">
                                    <div class="card mb-5 py-5 cardhover">
                                        <h4 class="text-center">Calls & Schedules</h4>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a class="nav-link" id="nav-scheduled-candidate-tab" data-coreui-toggle="tab"
                                    data-coreui-target="#nav-scheduled-candidate" type="button" role="tab"
                                    aria-controls="nav-scheduled-candidate" aria-selected="false">
                                    <div class="card mb-5 py-5 cardhover">
                                        <h4 class="text-center">Scheduled Candidate</h4>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a class="nav-link" id="nav-selected-rejected-tab" data-coreui-toggle="tab"
                                    data-coreui-target="#nav-selected-rejected" type="button" role="tab"
                                    aria-controls="nav-selected-rejected" aria-selected="false">
                                    <div class="card mb-5 py-5 cardhover">
                                        <h4 class="text-center">Selected/Rejected Candidate</h4>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a class="nav-link" id="nav-joined-tab" data-coreui-toggle="tab"
                                    data-coreui-target="#nav-joined" type="button" role="tab"
                                    aria-controls="nav-joined" aria-selected="false">
                                    <div class="card mb-5 py-5 cardhover">
                                        <h4 class="text-center">Joined</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-calls-schedules" role="tabpanel"
                            aria-labelledby="nav-calls-schedules-tab" tabindex="0">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <button class="btn btn-primary my-3" data-coreui-toggle="modal"
                                        data-coreui-target="#candidateModal">Add
                                        Candidate</button>
                                    <div class="modal fade" id="candidateModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                                                    <use
                                                                        xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user">
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
                                                                name="comments" value="{{ old('comments') }}" required
                                                                autocomplete="comments">
                                                            @error('comments')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <button class="btn btn-block btn-success text-white"
                                                            type="submit">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="my-5">Calls & Schedules</h2>
                                    <div class="d-flex">
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon3">From: </span>
                                                    <input type="text" id="min" name="min"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon3">To :</span>
                                                    <input type="text" id="max" name="max"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered display nowrap" id="example1"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Skills</th>
                                                <th>Comments</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hire as $req)
                                                <tr>
                                                    <td>{{ $req->id }}</td>
                                                    <td>{{ $req->name }}</td>
                                                    <td>{{ $req->email }}</td>
                                                    <td>{{ $req->contact }}</td>
                                                    <td>{{ $req->skills }}</td>
                                                    <td>{{ $req->comments }}</td>
                                                    <td>{{ $req->created_at->todatestring() }}</td>
                                                    <td>
                                                        @if ($req->status == 0)
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-sm text-white btn-warning dropdown-toggle"
                                                                    type="button" data-coreui-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Pending
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item"
                                                                            href="/move-scheduled/{{ $req->id }}">Move
                                                                            to Scheduled</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-scheduled-candidate" role="tabpanel"
                            aria-labelledby="nav-scheduled-candidate-tab" tabindex="0">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="my-5">Scheduled Candidate</h2>
                                    <table class="table table-striped table-bordered" id="example2" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Candidates</th>
                                                <th>Date of Interview and Time</th>
                                                <th>Team</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($scheduled as $req)
                                                <tr>
                                                    <td>{{ $req->id }}</td>
                                                    <td>{{ $req->name }}</td>
                                                    <td>
                                                        @if ($req->date_of_interview == null)
                                                            <button class="btn btn-primary btn-sm text-white"
                                                                data-coreui-toggle="modal"
                                                                data-coreui-target="#dateofInterview{{ $req->id }}">Add
                                                                Date & Time of Interview</button>
                                                            <div class="modal fade"
                                                                id="dateofInterview{{ $req->id }}" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Add Date
                                                                                & Time of Interview for {{ $req->name }}
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-coreui-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST"
                                                                                action="/update-candidate/{{ $req->id }}">
                                                                                @csrf
                                                                                <div class="input-group mb-3"><span
                                                                                        class="input-group-text">
                                                                                        <svg class="icon">
                                                                                            <use
                                                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-av-timer">
                                                                                            </use>
                                                                                        </svg></span>
                                                                                    <input placeholder="Date"
                                                                                        id="date_of_interview"
                                                                                        type="date"
                                                                                        class="form-control @error('date_of_interview') is-invalid @enderror"
                                                                                        name="date_of_interview"
                                                                                        value="{{ old('date_of_interview') }}"
                                                                                        required autocomplete="name"
                                                                                        autofocus>
                                                                                    @error('date_of_interview')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="input-group mb-3"><span
                                                                                        class="input-group-text">
                                                                                        <svg class="icon">
                                                                                            <use
                                                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-people">
                                                                                            </use>
                                                                                        </svg></span>
                                                                                    <select name="team" id=""
                                                                                        class="form-control">
                                                                                        <option value="" selected>
                                                                                            Select Team</option>
                                                                                        <option value="Online">Online
                                                                                        </option>
                                                                                        <option value="Design">Design
                                                                                        </option>
                                                                                        <option value="Content">Content
                                                                                        </option>
                                                                                        <option value="Sales">Sales
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('team')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <button
                                                                                    class="btn btn-block btn-success text-white"
                                                                                    type="submit">Save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            {{ $req->date_of_interview }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($req->team == null)
                                                            <button class="btn btn-sm btn-primary text-white"
                                                                data-coreui-toggle="modal"
                                                                data-coreui-target="#dateofInterview{{ $req->id }}">Add
                                                                Team</button>
                                                        @else
                                                            {{ $req->team }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($req->status == 1)
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-sm text-white btn-success dropdown-toggle"
                                                                    type="button" data-coreui-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Scheduled
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item"
                                                                            href="/move-selected/{{ $req->id }}">Select</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="/move-rejected/{{ $req->id }}">Reject</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-selected-rejected" role="tabpanel"
                            aria-labelledby="nav-selected-rejected-tab" tabindex="0">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="my-5">Selected Candidates</h2>
                                    <table class="table table-striped table-bordered" id="example3" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Candidates</th>
                                                <th>Comments</th>
                                                <th>Resume Uploading</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($selected as $req)
                                                <tr>
                                                    <td>{{ $req->id }}</td>
                                                    <td>{{ $req->name }}</td>
                                                    <td>{{ $req->comments }}</td>
                                                    <td>
                                                        @if ($req->resume != null)
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                href="/Resumes/{{ $req->resume }}"
                                                                download>{{ $req->resume }} <svg class="icon">
                                                                    <use
                                                                        xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download">
                                                                    </use>
                                                                </svg></a>
                                                        @else
                                                            <button class="btn btn-primary btn-sm text-white"
                                                                data-coreui-toggle="modal"
                                                                data-coreui-target="#addComments{{ $req->id }}">Upload</button>
                                                            <div class="modal fade" id="addComments{{ $req->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Add
                                                                                Comments for {{ $req->name }}
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-coreui-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST"
                                                                                action="/update-candidate/{{ $req->id }}"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="input-group mb-3"><span
                                                                                        class="input-group-text">
                                                                                        <svg class="icon">
                                                                                            <use
                                                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-file">
                                                                                            </use>
                                                                                        </svg></span>
                                                                                    <input placeholder="File"
                                                                                        id="resume" type="file"
                                                                                        class="form-control @error('resume') is-invalid @enderror"
                                                                                        name="resume"
                                                                                        value="{{ $req->resume }}"
                                                                                        required autocomplete="resume"
                                                                                        autofocus>
                                                                                    @error('resume')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="input-group mb-3"><span
                                                                                        class="input-group-text">
                                                                                        <svg class="icon">
                                                                                            <use
                                                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-comment-bubble">
                                                                                            </use>
                                                                                        </svg></span>
                                                                                    <input placeholder="Comments"
                                                                                        id="comments" type="text"
                                                                                        class="form-control @error('comments') is-invalid @enderror"
                                                                                        name="comments"
                                                                                        value="{{ $req->comments }}"
                                                                                        required autocomplete="comments"
                                                                                        autofocus>
                                                                                    @error('comments')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <button
                                                                                    class="btn btn-block btn-success text-white"
                                                                                    type="submit">Save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($req->status == 3)
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-sm text-white btn-success dropdown-toggle"
                                                                    type="button" data-coreui-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Selected
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item"
                                                                            href="/move-joined/{{ $req->id }}">Joined</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="my-5">Rejected Candidates</h2>
                                    <table class="table table-striped table-bordered" id="example6" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Candidates</th>
                                                <th>Comments</th>
                                                <th>Resume Uploading</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rejected as $req)
                                                <tr>
                                                    <td>{{ $req->id }}</td>
                                                    <td>{{ $req->name }}</td>
                                                    <td>{{ $req->comments }}</td>
                                                    <td>
                                                        @if ($req->resume != null)
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                href="/Resumes/{{ $req->resume }}"
                                                                download>{{ $req->resume }} <svg class="icon">
                                                                    <use
                                                                        xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download">
                                                                    </use>
                                                                </svg></a>
                                                        @else
                                                            <button class="btn btn-primary btn-sm text-white"
                                                                data-coreui-toggle="modal"
                                                                data-coreui-target="#addComments{{ $req->id }}">Upload</button>
                                                            <div class="modal fade" id="addComments{{ $req->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Add
                                                                                Comments for {{ $req->name }}
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-coreui-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST"
                                                                                action="/update-candidate/{{ $req->id }}"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="input-group mb-3"><span
                                                                                        class="input-group-text">
                                                                                        <svg class="icon">
                                                                                            <use
                                                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-file">
                                                                                            </use>
                                                                                        </svg></span>
                                                                                    <input placeholder="File"
                                                                                        id="resume" type="file"
                                                                                        class="form-control @error('resume') is-invalid @enderror"
                                                                                        name="resume"
                                                                                        value="{{ $req->resume }}"
                                                                                        required autocomplete="resume"
                                                                                        autofocus>
                                                                                    @error('resume')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="input-group mb-3"><span
                                                                                        class="input-group-text">
                                                                                        <svg class="icon">
                                                                                            <use
                                                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-comment-bubble">
                                                                                            </use>
                                                                                        </svg></span>
                                                                                    <input placeholder="Comments"
                                                                                        id="comments" type="text"
                                                                                        class="form-control @error('comments') is-invalid @enderror"
                                                                                        name="comments"
                                                                                        value="{{ $req->comments }}"
                                                                                        required autocomplete="comments"
                                                                                        autofocus>
                                                                                    @error('comments')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <button
                                                                                    class="btn btn-block btn-success text-white"
                                                                                    type="submit">Save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($req->status == 4)
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm text-white btn-danger"
                                                                    type="button">
                                                                    Rejected
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-joined" role="tabpanel" aria-labelledby="nav-joined-tab"
                            tabindex="0">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="my-5">Joined Candidates</h2>
                                    <table class="table table-striped table-bordered" id="example4" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($joined as $req)
                                                <tr>
                                                    <td>{{ $req->id }}</td>
                                                    <td>{{ $req->name }}</td>
                                                    <td>
                                                        @if ($req->status == 5)
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-sm text-white btn-success dropdown-toggle"
                                                                    type="button" data-coreui-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Joined
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item"
                                                                            href="/move-rejected/{{ $req->id }}">Reject</a>
                                                                    </li>
                                                                </ul>
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
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>

    <script>
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[6]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // DataTables initialisation
            var table = $('#example1').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                exportOptions: {
                    rows: {
                        search: 'applied'
                    }
                },
            });

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });
        });
        $(document).ready(function() {
            $('#example2').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('#example3').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('#example4').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('#example6').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
