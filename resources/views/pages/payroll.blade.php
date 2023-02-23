@extends('layouts.home')
@section('title')
    <title>Payroll | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Payrolls</h1>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Request for Payslip</h4>
                            <form action="{{ route('payroll.request') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row mt-4">
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">From</label>
                                        <input type="month" class="form-control" name="from_request" id="from_request" required>
                                    </div>
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">To</label>
                                        <input type="month" class="form-control" name="to_request" id="from_request" required>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">Reason</label>
                                        <textarea name="reason" class="form-control" id="reason" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>My Requests</h4>
                            <table class="table table-striped table-bordered" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($myreq as $req)
                                        <tr>
                                            <td>{{ $req->id }}</td>
                                            <td>{{ $req->from_date }}</td>
                                            <td>{{ $req->to_date }}</td>
                                            <td>
                                                @if ($req->req_status == 0)
                                                    <button class="btn btn-sm btn-warning text-white">Pending</button>
                                                @elseif ($req->req_status == 1)
                                                    <button class="btn btn-sm btn-success text-white">Approved</button>
                                                    <button class="btn btn-sm btn-primary text-white"
                                                        data-coreui-toggle="modal"
                                                        data-coreui-target="#payrollDownload{{ $req->id }}"><svg
                                                            class="icon">
                                                            <use
                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download">
                                                            </use>
                                                        </svg> Download</button>
                                                    <div class="modal fade" id="payrollDownload{{ $req->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title fw-bold" id="exampleModalLabel">
                                                                        {{ $payslip->fname }} {{ $payslip->mname }}
                                                                        {{ $payslip->lname }} </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-coreui-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div id="content">
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <img class="mb-5"
                                                                                        src="http://apsensys.com/img/logo.png"
                                                                                        alt="apsensys logo"
                                                                                        style="width: 200px; margin:auto; display:flex;">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="fw-bold"
                                                                                        style="display:flex; align-items: center;">
                                                                                        <h2 class="fw-bold mt-3">PAYSLIP
                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th>Employee ID</th>
                                                                                            <td>{{ $payslip->empcode }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Name</th>
                                                                                            <td>{{ $payslip->fname }}
                                                                                                {{ $payslip->mname }}
                                                                                                {{ $payslip->lname }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Designation</th>
                                                                                            <td>{{ $payslip->designation }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>DOB</th>
                                                                                            <td>{{ $payslip->dob }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Qualification</th>
                                                                                            <td>{{ $payslip->qualification }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>DOJ</th>
                                                                                            <td>{{ $payslip->joined_on }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>PAN NO:</th>
                                                                                            <td>{{ $payslip->pancard }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Aadhar NO:</th>
                                                                                            <td>{{ $payslip->aadhaar }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Parents/Gaurdian Contact
                                                                                                Number
                                                                                            </th>
                                                                                            <td>{{ $payslip->emernumber }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Parents/Gaurdian Email ID
                                                                                            </th>
                                                                                            <td>-</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th>PF NO:</th>
                                                                                            <td>{{ $payslip->pf_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>UAN NO:</th>
                                                                                            <td>{{ $payslip->uan }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>ESIC NO :</th>
                                                                                            <td>{{ $payslip->esic_no }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Bank Name</th>
                                                                                            <td>{{ $payslip->bank_name }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Bank Account Number</th>
                                                                                            <td>{{ $payslip->acc_number }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>IFSC Code</th>
                                                                                            <td>{{ $payslip->ifsc }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>SWIFT Code</th>
                                                                                            <td>-</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Bank Branch</th>
                                                                                            <td>{{ $payslip->bank_branch }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Bank Contact Number</th>
                                                                                            <td>-</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Bank Email ID </th>
                                                                                            <td>-</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th class="fw-bold">EARNINGS
                                                                                            </th>
                                                                                            <th class="fw-bold">Training
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Basic (45% of CTC)</th>
                                                                                            <td>{{ $payslip->earned_basic_da }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>HRA (20% of CTC)</th>
                                                                                            <td>{{ $payslip->earned_hra }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Medical Allowance (12.2% of
                                                                                                CTC)
                                                                                            </th>
                                                                                            <td>{{ $payslip->earned_med_allowance }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Conveyence (12% of CTC)</th>
                                                                                            <td>{{ $payslip->earned_conveyance }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="fw-bold">TOTAL</th>
                                                                                            <td class="fw-bold">
                                                                                                {{ $payslip->earned_basic_da + $payslip->earned_hra + $payslip->earned_med_allowance + $payslip->earned_conveyance }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th class="fw-bold">BENEFITS
                                                                                            </th>
                                                                                            <th class="fw-bold">Permanent
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>PROVIDENT FUND (10.8% of
                                                                                                CTC)
                                                                                            </th>
                                                                                            <td>{{ $payslip->last_epf }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>FOOD ALLOWANCE</th>
                                                                                            <td>{{ $payslip->ben_food_allowance }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>FUEL ALLOWANCE</th>
                                                                                            <td>{{ $payslip->ben_fuel_allowance }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>LIFE INSURANCE</th>
                                                                                            <td>-</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>ESIC</th>
                                                                                            <td>{{ $payslip->last_esic }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>BIR</th>
                                                                                            <td>-</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>SHIFT ALLOWANCE</th>
                                                                                            <td>{{ $payslip->ben_shift_allowance }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="fw-bold">TOTAL</th>
                                                                                            <td class="fw-bold">
                                                                                                {{ $payslip->last_epf + $payslip->ben_food_allowance + $payslip->ben_fuel_allowance + $payslip->last_esic + $payslip->ben_shift_allowance }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th class="fw-bold">DEDUCTIONS
                                                                                            </th>
                                                                                            <th>&nbsp;</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Professional Tax</th>
                                                                                            <td>{{ $payslip->professional_tax }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Govt Admin Charges</th>
                                                                                            <td>{{ $payslip->govt_charges }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Tax deducted at Source</th>
                                                                                            <td>0</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Income Tax</th>
                                                                                            <td>0</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Special deduction</th>
                                                                                            <td>{{ $payslip->special_deductions }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="fw-bold">TOTAL</th>
                                                                                            <td class="fw-bold">
                                                                                                {{ $payslip->professional_tax + $payslip->govt_charges + $payslip->special_deductions }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="mt-4">
                                                                                            <th class="fw-bold">TOTAL INCOME</th>
                                                                                            <td class="fw-bold">
                                                                                                {{ $payslip->earned_basic_da + $payslip->earned_hra + $payslip->earned_med_allowance + $payslip->earned_conveyance - ($payslip->professional_tax + $payslip->govt_charges + $payslip->special_deductions) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th class="fw-bold">ATTENDANCE
                                                                                            </th>
                                                                                            <th>&nbsp;</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Total number of days</th>
                                                                                            <td>{{ $payslip->no_of_working_days }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>LOPs</th>
                                                                                            <td>{{ $lop_leaves }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>Worked Days</th>
                                                                                            <td>{{ $payslip->no_of_days_payable }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-coreui-dismiss="modal">Close</button>
                                                                    <a href="{{ route('generate.pdf') }}"
                                                                        class="btn btn-primary"><svg class="icon">
                                                                            <use
                                                                                xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download">
                                                                            </use>
                                                                        </svg> Download</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($req->req_status == 2)
                                                    <button class="btn btn-sm btn-danger text-white">Rejecetd</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script type="text/javascript">
        $(window).on('load', function () {
            var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };
            $('#pdfview').click(function () {
                doc.fromHTML($('#pdfdiv').html(), 15, 15, {
                    'width': 100,
                    'elementHandlers': specialElementHandlers
                });
                doc.save('file.pdf');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
