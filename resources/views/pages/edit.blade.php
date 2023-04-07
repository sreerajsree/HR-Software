@extends('layouts.home')
@section('title')
    <title>Edit Employee Details | HR-Soft</title>
@endsection
@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Personal Details</strong></div>
                        <div class="card-body">
                            <form action="{{ route('update.employee', $employee->id) }}" method="POST">
                                @csrf
                                @if (Auth::user()->status == 0)
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="empcode">Employee Code</label>
                                            <input type="text" class="form-control" placeholder="empcode"
                                                value="{{ $employee->empcode }}" aria-label="Employee Id" name="empcode">
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control" placeholder="Department"
                                                value="{{ $employee->department }}" aria-label="Department"
                                                name="department">
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="designation">Designation</label>
                                            <input type="text" class="form-control" placeholder="Designation"
                                                value="{{ $employee->designation }}" aria-label="Designation"
                                                name="designation">
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="manager">Manager</label>
                                            <input type="text" class="form-control" placeholder="Manager"
                                                value="{{ $employee->manager }}" aria-label="Manager" name="manager">
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="ctc">CTC</label>
                                            <input type="text" class="form-control" placeholder="CTC"
                                                value="{{ $employee->ctc }}" aria-label="CTC" name="ctc">
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="joined_on">Joined On</label>
                                            <input type="date" class="form-control" placeholder="Joining date"
                                                value="{{ $employee->joined_on }}" aria-label="joined_on" name="joined_on">
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="pf_no">PF No</label>
                                            <input type="text" class="form-control" placeholder="PF No"
                                                value="{{ $employee->pf_no }}" aria-label="pf_no" name="pf_no">
                                            <span class="text-danger">to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="uan">UAN Number</label>
                                            <input type="text" class="form-control" value="{{ $employee->uan }}"
                                                aria-label="UAN Number" name="uan" required>
                                                <span class="text-danger">to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="esic_no">ESIC No</label>
                                            <input type="text" class="form-control" placeholder="Esic No"
                                                value="{{ $employee->esic_no }}" aria-label="esic_no" name="esic_no">
                                            <span class="text-danger">to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="empstatus">Employee Status</label>
                                            <select class="form-select" aria-label="Employee Status" name="empstatus">
                                                <option select>Select Employee Status</option>
                                                <option value="Training" <?php if ($employee->emp_status == 'Training') {
                                                    echo 'selected';
                                                } ?>> Training </option>
                                                <option value="Permanent" <?php if ($employee->emp_status == 'Permanent') {
                                                    echo 'selected';
                                                } ?>> Permanent </option>
                                                <option value="Notice" <?php if ($employee->emp_status == 'Notice') {
                                                    echo 'selected';
                                                } ?>> Notice </option>
                                                <option value="Resigned" <?php if ($employee->emp_status == 'Resigned') {
                                                    echo 'selected';
                                                } ?>> Resigned </option>
                                            </select>
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                        <div class="col">
                                            <label for="empposition">Position</label>
                                            <select class="form-select" aria-label="Employee Posititon" name="empposition">
                                                <option select>Select Employee Position</option>
                                                <option value="1" <?php if ($employee->status == 1) {
                                                    echo 'selected';
                                                } ?>> Employee </option>
                                                <option value="2" <?php if ($employee->status == 2) {
                                                    echo 'selected';
                                                } ?>> Manager </option>
                                            </select>
                                            <span class="text-danger">* to be filled by HR</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" value="{{ $employee->fname }}"
                                            aria-label="First name" name="fname" required>
                                    </div>
                                    <div class="col">
                                        <label for="mname">Middle Name</label>
                                        <input type="text" class="form-control" value="{{ $employee->mname }}"
                                            aria-label="Middle name" name="mname">
                                    </div>
                                    <div class="col">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" value="{{ $employee->lname }}"
                                            aria-label="Last name" name="lname" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control" value="{{ $employee->email }}"
                                            aria-label="E-Mail" name="email" required>
                                    </div>
                                    <div class="col">
                                        <label for="contact">Contact Number</label>
                                        <input type="number" class="form-control" value="{{ $employee->contact }}"
                                            aria-label="Contact Number" name="contact" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" value="{{ $employee->dob }}"
                                            aria-label="Date of Birth" name="dob" required>
                                    </div>
                                    <div class="col">
                                        <label for="blood">Blood Group</label>
                                        <select class="form-select" aria-label="Blood Group" name="blood" required>

                                            <option select>Select Blood Group</option>
                                            <option value="A+" <?php if ($employee->blood == 'A+') {
                                                echo 'selected';
                                            } ?>> A-positive (A+) </option>
                                            <option value="A-" <?php if ($employee->blood == 'A-') {
                                                echo 'selected';
                                            } ?>>A-negative (A-)</option>
                                            <option value="B+" <?php if ($employee->blood == 'B+') {
                                                echo 'selected';
                                            } ?>>B-positive (B+)</option>
                                            <option value="B-" <?php if ($employee->blood == 'B-') {
                                                echo 'selected';
                                            } ?>>B-negative (B-)</option>
                                            <option value="AB+" <?php if ($employee->blood == 'AB+') {
                                                echo 'selected';
                                            } ?>>AB-positive (AB+)</option>
                                            <option value="AB-" <?php if ($employee->blood == 'AB-') {
                                                echo 'selected';
                                            } ?>>AB-negative (AB-)</option>
                                            <option value="O+" <?php if ($employee->blood == 'O+') {
                                                echo 'selected';
                                            } ?>>O-positive (O+)</option>
                                            <option value="O-" <?php if ($employee->blood == 'O-') {
                                                echo 'selected';
                                            } ?>>O-negative (O-)</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="gender">Gender</label>
                                        <select class="form-select" aria-label="Gender" name="gender" required>
                                            <option selected>Select Gender</option>
                                            <option value="Male" <?php if ($employee->gender == 'Male') {
                                                echo 'selected';
                                            } ?>>Male</option>
                                            <option value="Female" <?php if ($employee->gender == 'Female') {
                                                echo 'selected';
                                            } ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="marital">Marital Status</label>
                                        <select class="form-select" aria-label="Marital Status" name="marital" required>
                                            <option selected>Marital Status</option>
                                            <option value="Single" <?php if ($employee->marital == 'Single') {
                                                echo 'selected';
                                            } ?>>Single</option>
                                            <option value="Married" <?php if ($employee->marital == 'Married') {
                                                echo 'selected';
                                            } ?>>Married</option>
                                            <option value="Divorced" <?php if ($employee->marital == 'Divorced') {
                                                echo 'selected';
                                            } ?>>Divorced</option>
                                            <option value="Widowed" <?php if ($employee->marital == 'Widowed') {
                                                echo 'selected';
                                            } ?>>Widowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="spouse">Spouse</label>
                                        <input type="text" class="form-control" value="{{ $employee->spouse }}"
                                            aria-label="Spouse Name" name="spouse">
                                    </div>
                                    <div class="col">
                                        <label for="father">Father</label>
                                        <input type="text" class="form-control" value="{{ $employee->father }}"
                                            aria-label="Father Name" name="father" required>
                                    </div>
                                    <div class="col">
                                        <label for="mother">Mother</label>
                                        <input type="text" class="form-control" value="{{ $employee->mother }}"
                                            aria-label="Mother Name" name="mother" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="foccupation">Father's Occupation</label>
                                        <input type="text" class="form-control" value="{{ $employee->foccupation }}"
                                            aria-label="Father Occupation" name="foccupation" required>
                                    </div>
                                    <div class="col">
                                        <label for="moccupation">Mother</label>
                                        <input type="text" class="form-control" value="{{ $employee->moccupation }}"
                                            aria-label="Mother Occupation" name="moccupation" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="emername">Emergency Name</label>
                                        <input type="text" class="form-control" value="{{ $employee->emername }}"
                                            aria-label="Emer Name" name="emername" required>
                                    </div>
                                    <div class="col">
                                        <label for="emernumber">Emergency Number</label>
                                        <input type="number" class="form-control" value="{{ $employee->emernumber }}"
                                            aria-label="Emer Contact" name="emernumber" required>
                                    </div>
                                </div>
                        </div>
                        <div class="card-header"><strong>Address Section</strong></div>
                        <h5 class="text-center mt-3">Temporary Address</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="emername">Address 1</label>
                                    <textarea name="temp_address_1" cols="30" rows="10" class="form-control" required>{{ $employee->temp_address_1 }}</textarea>
                                </div>
                                <div class="col">
                                    <label for="emername">Address 2</label>
                                    <textarea name="temp_address_2" cols="30" rows="10" class="form-control" required>{{ $employee->temp_address_2 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="temp_city">City</label>
                                    <input type="text" class="form-control" value="{{ $employee->temp_city }}"
                                        name="temp_city" id="temp_city"  aria-label="City" required>
                                </div>
                                <div class="col">
                                    <label for="temp_state">State</label>
                                    <input type="text" class="form-control" value="{{ $employee->temp_state }}"
                                        name="temp_state" id="temp_state" aria-label="State" required>
                                </div>
                                <div class="col">
                                    <label for="number">Pincode</label>
                                    <input type="number" class="form-control" value="{{ $employee->temp_pincode }}"
                                        name="temp_pincode" aria-label="Pincode" required
                                        pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;"
                                     id="temp_pincode" onkeyup="getPostalData('temp_pincode')"
                                        >
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center mt-3">Permanent Address</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="perm_address_1">Address 1</label>
                                    <textarea name="perm_address_1" cols="30" rows="10" class="form-control" required>{{ $employee->perm_address_1 }}</textarea>
                                </div>
                                <div class="col">
                                    <label for="perm_address_2">Address 2</label>
                                    <textarea name="perm_address_2" cols="30" rows="10" class="form-control" required>{{ $employee->perm_address_2 }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="perm_city">City</label>
                                    <input type="text" class="form-control" value="{{ $employee->perm_city }}"
                                        name="perm_city" id="perm_city" aria-label="City" required>
                                </div>
                                <div class="col">
                                    <label for="perm_state">State</label>
                                    <input type="text" class="form-control" value="{{ $employee->perm_state }}"
                                        name="perm_state" id="perm_state" aria-label="State" required>
                                </div>
                                <div class="col">
                                    <label for="perm_pincode">Pincode</label>
                                    <input type="number" class="form-control" value="{{ $employee->perm_pincode }}"
                                        name="perm_pincode" aria-label="Pincode" required
                                        pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;"
                                     id="perm_pincode" onkeyup="getPostalData('perm_pincode')"
                                        >
                                </div>
                            </div>
                        </div>
                        <div class="card-header"><strong>Qualification Section</strong></div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="qualification">Qualification</label>
                                    <input type="text" class="form-control" value="{{ $employee->qualification }}"
                                        aria-label="Qualification" name="qualification" required>
                                </div>
                                <div class="col">
                                    <label for="education">Education</label>
                                    <input type="text" class="form-control" value="{{ $employee->education }}"
                                        aria-label="Education" name="education" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-header"><strong>Bank Section</strong></div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="pancard">Pan Card</label>
                                    <input type="text" class="form-control" value="{{ $employee->pancard }}"
                                        aria-label="Pan Card" name="pancard" required>
                                </div>
                                <div class="col">
                                    <label for="aadhaar">Aadhaar Card</label>
                                    <input type="number" class="form-control" value="{{ $employee->aadhaar }}"
                                        aria-label="Aadhaar Card" name="aadhaar" required>
                                </div>
                                
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" value="{{ $employee->bank_name }}"
                                        aria-label="Bank Name" name="bank_name" required>
                                </div>
                                <div class="col">
                                    <label for="bank_branch">Bank Banch Name</label>
                                    <input type="text" class="form-control" value="{{ $employee->bank_branch }}"
                                        aria-label="Branch Name" name="bank_branch" required>
                                </div>
                                <div class="col">
                                    <label for="acc_number">Account Number</label>
                                    <input type="number" class="form-control" value="{{ $employee->acc_number }}"
                                        aria-label="Account Number" name="acc_number" required>
                                </div>
                                <div class="col">
                                    <label for="ifsc">IFSC Number</label>
                                    <input type="text" class="form-control" value="{{ $employee->ifsc }}"
                                        aria-label="IFSC Code" name="ifsc" required>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
        function getPostalData(id){
            var PINCODE = document.getElementById(id).value;
            if(PINCODE.length==6){
                const options = {
                method: 'get',
                redirect: 'follow',
                };
                fetch(`https://api.postalpincode.in/pincode/${PINCODE}`, options)
                .then(response => response.json())
                .then(response => {
                    if(id=="perm_pincode"){
                        document.getElementById('perm_city').value=response[0].PostOffice[0].District;
                        document.getElementById('perm_state').value=response[0].PostOffice[0].State;
                    }
                    if(id=="temp_pincode"){
                        document.getElementById('temp_city').value=response[0].PostOffice[0].District;
                        document.getElementById('temp_state').value=response[0].PostOffice[0].State;
                    }

                    //console.log(response[0].PostOffice[0].State)
                })
                .catch(err => console.error(err));
            }else{
                if(id=="perm_pincode"){
                        document.getElementById('perm_city').value='';
                        document.getElementById('perm_state').value='';
                    }
                    if(id=="temp_pincode"){
                        document.getElementById('temp_city').value='';
                        document.getElementById('temp_state').value='';
                    }
            }


        }

//getPostalData(756046)
//console.log(Object.values(response[0])

    // var requestOptions = {
    // method: 'GET',
    // redirect: 'follow'
    // };

    // fetch("https://api.postalpincode.in/pincode/756046", requestOptions)
    // .then(response => response.text())
    // .then(result => console.log(result))
    // .catch(error => console.log('error', error));
    </script>
    @endsection
