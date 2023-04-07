@extends('layouts.home')
@section('title')
    <title>{{ str_replace('-', ' ', $employees[0]->name) }} Employees | HR-Soft</title>
@endsection
@section('content')
    <div class="header-divider"></div>

    <div class="body flex-grow-1 px-3">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title text-capitalize">{{ str_replace('-', ' ', $employees[0]->name) }} Employees</h3>
                @if ($users->status == 0)
                    <a href="javascript:void(0);" data-coreui-toggle="modal" data-coreui-target="#empRegisterModal"
                        class="btn btn-primary float-end"><svg class="icon icon-md">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg> Add Employee</a>
                @endif
            </div>
            <div class="modal fade" id="empRegisterModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Employee to
                                {{ str_replace('-', ' ', $employees[0]->name) }}</h5>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('add.employee') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $employees[0]->company_id }}">
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                                        </svg></span>
                                    <input placeholder="Name" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                        </svg></span>
                                    <input placeholder="Username" id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
                                        </svg></span>
                                    <select name="shift" id="" class="form-control">
                                        <option value="" selected>Select Shift</option>
                                        <option value="US">USA Shift</option>
                                        <option value="IN">India Shift</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input placeholder="Password" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input placeholder="Repeat Password" id="password-confirm" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                                <button class="btn btn-block btn-success text-white" type="submit">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%"
                    data-order="[[ 1, &quot;asc&quot; ]]">
                    <thead>
                        <tr>
                            <th>Employee Code</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                            <th>contact</th>
                            <th>email</th>
                            <th>DOB</th>
                            <th>gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                            <tr>
                                <td>{{ $emp->empcode }}</td>
                                <td>{{ $emp->fname }}</td>
                                <td>{{ $emp->lname }}</td>
                                <td>{{ $emp->emp_status }}</td>
                                <td>{{ $emp->contact }}</td>
                                <td>{{ $emp->email }}</td>
                                <td>{{ $emp->dob }}</td>
                                <td>{{ $emp->gender }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" data-coreui-toggle="modal"
                                            data-coreui-target="#showEmployee{{ $emp->id }}"
                                            class="btn btn-sm btn-primary m-2">Show</a>
                                        <div class="modal fade" id="showEmployee{{ $emp->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Details of
                                                            {{ $emp->fname }} {{ $emp->lname }}</h5>
                                                        <button type="button" class="btn-close"
                                                            data-coreui-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <button class="nav-link active fw-bold"
                                                                    id="nav-profile-tab" data-coreui-toggle="tab"
                                                                    data-coreui-target="#nav-profile" type="button"
                                                                    role="tab" aria-controls="nav-profile"
                                                                    aria-selected="true">Profile</button>
                                                                <button class="nav-link fw-bold" id="nav-office-tab"
                                                                    data-coreui-toggle="tab"
                                                                    data-coreui-target="#nav-office" type="button"
                                                                    role="tab" aria-controls="nav-office"
                                                                    aria-selected="false">Office</button>
                                                                <button class="nav-link fw-bold" id="nav-department-tab"
                                                                    data-coreui-toggle="tab"
                                                                    data-coreui-target="#nav-department" type="button"
                                                                    role="tab" aria-controls="nav-department"
                                                                    aria-selected="false">Department</button>
                                                                <button class="nav-link fw-bold"
                                                                    id="nav-qualification-tab" data-coreui-toggle="tab"
                                                                    data-coreui-target="#nav-qualification" type="button"
                                                                    role="tab" aria-controls="nav-qualification"
                                                                    aria-selected="false">Qualification</button>
                                                                <button class="nav-link fw-bold" id="nav-address-tab"
                                                                    data-coreui-toggle="tab"
                                                                    data-coreui-target="#nav-address" type="button"
                                                                    role="tab" aria-controls="nav-address"
                                                                    aria-selected="false">Address</button>
                                                                <button class="nav-link fw-bold" id="nav-bank-tab"
                                                                    data-coreui-toggle="tab"
                                                                    data-coreui-target="#nav-bank" type="button"
                                                                    role="tab" aria-controls="nav-bank"
                                                                    aria-selected="false">Bank</button>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="nav-profile"
                                                                role="tabpanel" aria-labelledby="nav-profile-tab"
                                                                tabindex="0">
                                                                <div class="w-100 mt-5">
                                                                    <table
                                                                        class="w-100 table table-striped table-bordered">
                                                                        <tr>
                                                                            <th>Employee Code</th>
                                                                            <td>{{ $emp->empcode }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>First Name</th>
                                                                            <td>{{ $emp->fname }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Middle Name</th>
                                                                            <td>{{ $emp->mname }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Last Name</th>
                                                                            <td>{{ $emp->lname }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Contact Number</th>
                                                                            <td>{{ $emp->contact }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Email ID</th>
                                                                            <td>{{ $emp->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>DOB</th>
                                                                            <td>{{ $emp->dob }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Blood Group</th>
                                                                            <td>{{ $emp->blood }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Gender</th>
                                                                            <td>{{ $emp->gender }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Marital Status</th>
                                                                            <td>{{ $emp->marital }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Spouse Name</th>
                                                                            <td>{{ $emp->spouse }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Father Name</th>
                                                                            <td>{{ $emp->father }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Father Occupation</th>
                                                                            <td>{{ $emp->foccupation }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Mother Name</th>
                                                                            <td>{{ $emp->mother }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Mother Occupation</th>
                                                                            <td>{{ $emp->moccupation }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Emergency Contact Name</th>
                                                                            <td>{{ $emp->emername }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Emergency Contact Number</th>
                                                                            <td>{{ $emp->emernumber }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-office" role="tabpanel"
                                                                aria-labelledby="nav-office-tab" tabindex="0">
                                                                <div class="w-100 mt-5">
                                                                    <table
                                                                        class="w-100 table table-striped table-bordered">
                                                                        <tr>
                                                                            <th>Username</th>
                                                                            <td>{{ $emp->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Date of Joining</th>
                                                                            <td>{{ $emp->joined_on }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Shift</th>
                                                                            <td>{{ $emp->shift }}</td>
                                                                        </tr>
                                                                        @if ($emp->shift == 'IN')
                                                                            <tr>
                                                                                <th>Login Time</th>
                                                                                <td>12:00 PM</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Logout Time</th>
                                                                                <td>09:00 PM</td>
                                                                            </tr>
                                                                        @else
                                                                            <tr>
                                                                                <th>Login Time</th>
                                                                                <td>07:00 PM</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Logout Time</th>
                                                                                <td>04:00 AM</td>
                                                                            </tr>
                                                                        @endif
                                                                        <tr>
                                                                            <th>Status</th>
                                                                            <td>{{ $emp->emp_status }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-department"
                                                                role="tabpanel" aria-labelledby="nav-department-tab"
                                                                tabindex="0">
                                                                <div class="w-100 mt-5">
                                                                    <table
                                                                        class="w-100 table table-striped table-bordered">
                                                                        <tr>
                                                                            <th>Employee Code</th>
                                                                            <td>{{ $emp->empcode }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Department</th>
                                                                            <td>{{ $emp->department }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Designation</th>
                                                                            <td>{{ $emp->designation }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Manager</th>
                                                                            <td>{{ $emp->manager }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-qualification"
                                                                role="tabpanel" aria-labelledby="nav-qualification-tab"
                                                                tabindex="0">
                                                                <div class="w-100 mt-5">
                                                                    <table
                                                                        class="w-100 table table-striped table-bordered">
                                                                        <tr>
                                                                            <th>Qualification</th>
                                                                            <td>{{ $emp->qualification }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Education</th>
                                                                            <td>{{ $emp->education }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-address" role="tabpanel"
                                                                aria-labelledby="nav-address-tab" tabindex="0">
                                                                <div class="w-100 mt-5">
                                                                    <h4>Permanent Address</h4>
                                                                    <table
                                                                        class="w-100 table table-striped table-bordered">
                                                                        <tr>
                                                                            <th>Address Line 1</th>
                                                                            <td>{{ $emp->perm_address_1 }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Address Line 2</th>
                                                                            <td>{{ $emp->perm_address_2 }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>City</th>
                                                                            <td>{{ $emp->perm_city }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>State</th>
                                                                            <td>{{ $emp->perm_state }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Pincode</th>
                                                                            <td>{{ $emp->perm_pincode }}</td>
                                                                        </tr>
                                                                    </table>
                                                                    <h4 class="mt-5">Temporary Address</h4>
                                                                    <table
                                                                        class="w-100 table table-striped table-bordered">
                                                                        <tr>
                                                                            <th>Address Line 1</th>
                                                                            <td>{{ $emp->temp_address_1 }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Address Line 2</th>
                                                                            <td>{{ $emp->temp_address_2 }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>City</th>
                                                                            <td>{{ $emp->temp_city }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>State</th>
                                                                            <td>{{ $emp->temp_state }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Pincode</th>
                                                                            <td>{{ $emp->temp_pincode }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-bank" role="tabpanel"
                                                                aria-labelledby="nav-bank-tab" tabindex="0">
                                                                <div class="w-100 mt-5">
                                                                    <table
                                                                        class="w-100 table table-striped table-bordered">
                                                                        <tr>
                                                                            <th>PAN</th>
                                                                            <td>{{ $emp->pancard }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Aadhaar</th>
                                                                            <td>{{ $emp->aadhaar }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>UAN</th>
                                                                            <td>{{ $emp->uan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Bank Name</th>
                                                                            <td>{{ $emp->bank_name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Acc Number</th>
                                                                            <td>{{ $emp->acc_number }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Bank Branch</th>
                                                                            <td>{{ $emp->bank_branch }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>IFSC</th>
                                                                            <td>{{ $emp->ifsc }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary text-white"
                                                            data-coreui-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       @if(Auth::user()->status == 0)
                                        <a href="/edit-employee/{{ encrypt($emp->id) }}"
                                            class="btn btn-sm btn-secondary m-2">Edit</a>
                                        @endif
                                        <a href="/edit-payroll/{{ encrypt($emp->id) }}"
                                            class="btn btn-sm btn-dark m-2">Salary Details</a>
                                        <a href="/hike/{{ encrypt($emp->id) }}"
                                            class="btn btn-sm btn-warning m-2">Hike</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
