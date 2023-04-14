@extends('layouts.home')
@section('title')
    <title>Profile | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="/ProfileImages/{{ Auth::user()->profile_pic }}" alt="Profile Picture"
                                    class="rounded-circle" width="150" height="150" style="object-fit: cover">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="fw-bold mb-1">
                                        @if (isset($user->designation))
                                            {{ $user->designation }}
                                        @else
                                            Not Yet Updated
                                        @endif
                                    </p>
                                    <P class="mb-1 fw-bold">EMP ID :
                                        @if (Auth::user()->empcode == null)
                                            Not Yet Updated
                                        @else
                                            {{ Auth::user()->empcode }}
                                        @endif
                                    </P>
                                    <p>Joined
                                        {{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d-M-Y') }}
                                    </p>
                                    <button type="button" class="btn btn-primary" data-coreui-toggle="modal"
                                        data-coreui-target="#profilePicture">
                                        Change Picture
                                    </button>
                                    <div class="modal fade" id="profilePicture" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture
                                                    </h5>
                                                    <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('profile-pic-upload') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col">
                                                            <input class="form-control" name="image" type="file"
                                                                id="formFile">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="mb-5">Details</h3>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9">
                                    @if (isset($user->fname) || isset($user->mname) || isset($user->lname))
                                        {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}
                                    @else
                                        Not Yet Updated
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9">
                                    @if (isset($user->contact))
                                        {{ $user->contact }}
                                    @else
                                        Not Yet Updated
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                @if (isset($user->temp_pincode))
                                    <div class="col-sm-9">
                                        {{ $user->temp_address_1 }},<br>
                                        {{ $user->temp_address_2 }},<br>
                                        {{ $user->temp_city }},
                                        {{ $user->temp_state }}<br>
                                        {{ $user->temp_pincode }}
                                    </div>
                                @else
                                    <div class="col-sm-9">
                                        Not Yet Updated
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->status == 0)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="mb-5">Change Password</h3>
                            <form action="{{ route('update-password') }}" method="POST">
                                @csrf
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
        
                                    <div class="mb-3">
                                        <label for="oldPasswordInput" class="form-label">Old Password</label>
                                        <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                            placeholder="Old Password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPasswordInput" class="form-label">New Password</label>
                                        <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                            placeholder="New Password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                        <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                            placeholder="Confirm New Password">
                                    </div>
                                    <button class="btn btn-primary">Change</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
