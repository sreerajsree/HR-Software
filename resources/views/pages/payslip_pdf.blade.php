<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        table {
            border-collapse: collapse;
            border-spacing: 0;
            font-size: 12px;
            width: 100%;
        }

        th {
            border: 1px solid #222;
            padding: 3.5px 4px;
            text-align: left;
        }

        td {
            border: 1px solid #222;
            padding: 3.5px 4px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th style="text-align: center;"><img class="mb-5" src="http://apsensys.com/img/logo.png" alt="apsensys logo"
                    style="width: 200px; margin:auto; display:flex;"></th>
            <th style="text-align: center;">
                <h2 class="fw-bold mt-3">PAYSLIP
                </h2>
            </th>
        </tr>
    </table>
    <table>
        <tr>
            <th>
                <table>
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
            </th>
            <th>
                <table>
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
            </th>
        </tr>
    </table>
    <table>
        <tr>
            <th>
                <table>
                    <tr>
                        <th class="fw-bold">EARNINGS
                        </th>
                        <th class="fw-bold">Training
                        </th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
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
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">TOTAL</th>
                        <td class="fw-bold">
                            {{ $payslip->earned_basic_da + $payslip->earned_hra + $payslip->earned_med_allowance + $payslip->earned_conveyance }}
                        </td>
                    </tr>
                </table>
            </th>
            <th>
                <table>
                    <tr>
                        <th class="fw-bold">BENEFITS
                        </th>
                        <th class="fw-bold">Permanent
                        </th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
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
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">TOTAL</th>
                        <td class="fw-bold">
                            {{ $payslip->last_epf + $payslip->ben_food_allowance + $payslip->ben_fuel_allowance + $payslip->last_esic + $payslip->ben_shift_allowance }}
                        </td>
                    </tr>
                </table>
            </th>
        </tr>
    </table>
    <table>
        <tr>
            <th>
                <table>
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
                </table>
            </th>
            <th>
                <table>
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
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </th>
        </tr>
    </table>
    <table>
        <tr>
            <th class="fw-bold">Total Income
            </th>
            <th>{{ $payslip->earned_basic_da + $payslip->earned_hra + $payslip->earned_med_allowance + $payslip->earned_conveyance - ($payslip->professional_tax + $payslip->govt_charges + $payslip->special_deductions) }}
            </th>
        </tr>
    </table>

    <div style="text-align: right; font-weight:bold; margin-top: 20px; font-size: 12px;">Authorized Signature</div>
    <div style="margin-top: 30px; text-align: center; font-size: 12px; font-weight: bold;">
        <p style="color: blueviolet;">WE THANK YOU FOR YOUR EFFORTS, KEEP UP THE GOOD WORK!</p>
        <p style="font-style: italic; margin-top: 10px;">This is Computer Generated Payslip. If you have any questions about this payslip, Please contact on below number</p>
        <p style="margin-top: 10px;">Apsensys Media LLP, No 105, Apsensys Business Tower, Service Road, Horamavu, Bangalore 560043, Karnataka</p>
        <p style="margin-top: 2px;">Phone: 080-237273273 l Email: hr@thesiliconreview.com</p>
    </div>

</body>

</html>
