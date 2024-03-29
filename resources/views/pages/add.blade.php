@extends('layouts.home')
@section('title')
    <title>Employee Details | HR-Soft</title>
@endsection
@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Personal Section</strong></div>
                        <div class="card-body">
                            <form action="{{ route('add.details') }}" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="hidden" class="form-control" name="user_id"
                                            value="{{ $users->id }}">
                                        <input type="text" class="form-control" placeholder="First name"
                                            aria-label="First name" name="fname" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Middle name"
                                            aria-label="Middle name" name="mname">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Last name"
                                            aria-label="Last name" name="lname">
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <input type="email" class="form-control" placeholder="Personal E-Mail"
                                            aria-label="Personal E-Mail" name="email" required>
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Contact Number"
                                            aria-label="Contact Number" name="contact" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <input type="date" class="form-control" placeholder="Date of Birth"
                                            aria-label="Date of Birth" name="dob" required>
                                    </div>
                                    <div class="col">
                                        <select class="form-select" aria-label="Blood Group" name="blood" required>
                                            <option selected>Select Blood Group</option>
                                            <option value="A+">A-positive (A+)</option>
                                            <option value="A-">A-negative (A-)</option>
                                            <option value="B+">B-positive (B+)</option>
                                            <option value="B-">B-negative (B-)</option>
                                            <option value="AB+">AB-positive (AB+)</option>
                                            <option value="AB-">AB-negative (AB-)</option>
                                            <option value="O+">O-positive (O+)</option>
                                            <option value="O-">O-negative (O-)</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-select" aria-label="Gender" name="gender" required>
                                            <option selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-select" aria-label="Marital Status" name="marital" required>
                                            <option selected>Marital Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Spouse Name"
                                            aria-label="Spouse Name" name="spouse">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Father Name"
                                            aria-label="Father Name" name="father" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Mother Name"
                                            aria-label="Mother Name" name="mother" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Father's Occupation"
                                            aria-label="Father Occupation" name="foccupation" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Mother's Occupation"
                                            aria-label="Mother Occupation" name="moccupation" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Emergency Contact Name"
                                            aria-label="Emer Name" name="emername" required>
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Emergency Contact Number"
                                            aria-label="Emer Contact" name="emernumber" required>
                                    </div>
                                </div>
                        </div>
                        <div class="card-header"><strong>Address Section</strong></div>
                        <h5 class="text-center mt-3">Temorary Address</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <textarea name="temp_address_1" id="temp_address_1" class="form-control" placeholder="Address Line 1" required></textarea>
                                </div>
                                <div class="col">
                                    <textarea name="temp_address_2" id="temp_address_2" class="form-control" placeholder="Address Line 2" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <input type="number" class="form-control" placeholder="Pincode" name="temp_pincode"
                                        aria-label="Pincode" required pattern="/^-?\d+\.?\d*$/"
                                        onKeyPress="if(this.value.length==6) return false;" id="temp_pincode"
                                        onkeyup="getPostalData('temp_pincode')">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="State" name="temp_state"
                                        aria-label="State" id="temp_state" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="City" name="temp_city"
                                        aria-label="City" id="temp_city" required>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center">Permanent Address</h5>
                        <div class="d-flex p-3">
                            <input type="checkbox" id="same" name="same" onchange="addressFunction()" />
                            <label for="same">
                                &nbsp;Same as Temporary Address
                            </label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <textarea name="perm_address_1" class="form-control" id="perm_address_1" placeholder="Address Line 1" required></textarea>
                                </div>
                                <div class="col">
                                    <textarea name="perm_address_2" class="form-control" id="perm_address_2" placeholder="Address Line 2" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <input type="number" class="form-control" placeholder="Pincode" name="perm_pincode"
                                        aria-label="Pincode" required pattern="/^-?\d+\.?\d*$/"
                                        onKeyPress="if(this.value.length==6) return false;" id="perm_pincode"
                                        onkeyup="getPostalData('perm_pincode')">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="State" name="perm_state"
                                        aria-label="State"id="perm_state" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="City" name="perm_city"
                                        aria-label="City" id="perm_city" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-header"><strong>Qualification Section</strong></div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Degree"
                                        aria-label="Qualification" name="qualification" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="College/University"
                                        aria-label="Education" name="education" required>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" placeholder="Year of Passing"
                                        aria-label="yop" name="yop" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-header"><strong>Bank Section</strong></div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Pan Card"
                                        aria-label="Pan Card" name="pancard" required>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" placeholder="Aadhaar Card"
                                        aria-label="Aadhaar Card" name="aadhaar" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="UAN Number"
                                        aria-label="UAN Number" name="uan" required>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="IFSC Code"
                                        aria-label="IFSC Code" name="ifsc" required>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" placeholder="Account Number"
                                        aria-label="Account Number" name="acc_number" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Bank Name"
                                        aria-label="Bank Name" name="bank_name" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Branch Name"
                                        aria-label="Branch Name" name="bank_branch" required>
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
            function addressFunction() {
                if (document.getElementById("same").checked) {
                    document.getElementById("perm_address_1").value = document.getElementById("temp_address_1").value;
                    document.getElementById("perm_address_2").value = document.getElementById("temp_address_2").value;
                    document.getElementById("perm_pincode").value = document.getElementById("temp_pincode").value;
                    document.getElementById("perm_state").value = document.getElementById("temp_state").value;
                    document.getElementById("perm_city").value = document.getElementById("temp_city").value;
                } else {
                    document.getElementById("perm_address_1").value = "";
                    document.getElementById("perm_address_2").value = "";
                    document.getElementById("perm_pincode").value = "";
                    document.getElementById("perm_state").value = "";
                    document.getElementById("perm_city").value = "";
                }
            }

            function getPostalData(id) {
                var PINCODE = document.getElementById(id).value;
                if (PINCODE.length == 6) {
                    const options = {
                        method: 'get',
                        redirect: 'follow',
                    };
                    fetch(`https://api.postalpincode.in/pincode/${PINCODE}`, options)
                        .then(response => response.json())
                        .then(response => {
                            if (id == "perm_pincode") {
                                document.getElementById('perm_city').value = response[0].PostOffice[0].District;
                                document.getElementById('perm_state').value = response[0].PostOffice[0].State;
                            }
                            if (id == "temp_pincode") {
                                document.getElementById('temp_city').value = response[0].PostOffice[0].District;
                                document.getElementById('temp_state').value = response[0].PostOffice[0].State;
                            }

                            //console.log(response[0].PostOffice[0].State)
                        })
                        .catch(err => console.error(err));
                } else {
                    if (id == "perm_pincode") {
                        document.getElementById('perm_city').value = '';
                        document.getElementById('perm_state').value = '';
                    }
                    if (id == "temp_pincode") {
                        document.getElementById('temp_city').value = '';
                        document.getElementById('temp_state').value = '';
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