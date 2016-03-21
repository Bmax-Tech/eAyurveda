<div style="font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue'">
    <div><img style="width: 250px" src="http://php-eayurveda.rhcloud.com/assets/img/logo.png"></div>
    <div><span style="color: #339a44;font-size: 24px">Appointment !</span></div>
    <div style="margin-top: 10px">
        An appointment has been made by one of our valuable customer, requesting for your service.
    </div>
    <br/>
    <table style="font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue'">
    <tr>
        <td><div style="font-size: 15px;color: rgba(0, 0, 0, 0.49)">Patient Name</div></td>
        <td width="20px"></td>
        <td><div>:&nbsp;&nbsp;<span style="font-weight: 500">{{ $patient_first_name }}&nbsp;{{ $patient_last_name }}</span></div></td>
    </tr>
    <tr>
        <td><div style="font-size: 15px;color: rgba(0, 0, 0, 0.49)">Contact Number</div></td>
        <td width="20px"></td>
        <td><div>:&nbsp;&nbsp;<span style="font-weight: 500">{{ $patient_contact_number }}</span></div></td>
    </tr>
    <tr>
        <td><div style="font-size: 15px;color: rgba(0, 0, 0, 0.49)">Email</div></td>
        <td width="20px"></td>
        <td><div>:&nbsp;&nbsp;<span style="font-weight: 500">{{ $patient_email }}</span></div></td>
    </tr>
    <tr>
        <td><div style="font-size: 15px;color: rgba(0, 0, 0, 0.49)">District</div></td>
        <td width="20px"></td>
        <td><div>:&nbsp;&nbsp;<span style="font-weight: 500">{{ $patient_district }}</span></div></td>
    </tr>
    <tr><td height="10px" colspan="3"></td></tr>
    <tr>
        <td><div style="font-size: 15px;color: rgb(233, 0, 3);font-weight: 500">Time Slot</div></td>
        <td width="20px"></td>
        <td><div>:&nbsp;&nbsp;<span style="font-weight: 500">{{ $time_slot }}</span></div></td>
    </tr>
    </table>
    <br/>
    <div><span style="font-weight: 500">eAyurveda Team</span></div>
    <div><span style="font-size: 12px"><a style="text-decoration: none !important;" href="#">eayurveda@help.com</a></span></div>
</div>

