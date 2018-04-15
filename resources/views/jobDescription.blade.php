@include('head')
<div class="container">
    <div class="row">
    @include('menu')
    
        <div class="col-sm-12" style="margin-top:25px;">
            <div class="row">
                <div class="col-sm-10" style="margin-top:50px">
                    <div class="col-sm-10" style="margin-bottom:30px">
                        <center>
                            <p class="font-size">{{$jobDetail[0]->company_name}} - {{$jobDetail[0]->job_role}}</p>
                        </center>
                    </div>
                <table class="table">
                    <tr>
                        <td class="font-color"> Job Description </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->job_description))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Experience </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->experience))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Qualification </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->qualification))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Key Skills </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->key_skills))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Company Profile </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->company_profile))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Address </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->address))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Interview Dates </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->interview_dates))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Email Address </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> <a href="mailto:{{$jobDetail[0]->email_address}}">{{$jobDetail[0]->email_address}}</a></td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Contact Number </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td> {!! nl2br(e($jobDetail[0]->contact_number))!!}</td> 
                    <tr>
                    <tr>
                        <td class="font-color"> Posted Date </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td>{{date(' l d-M-y', strtotime($jobDetail[0]->created_at))}}</td> 
                    <tr>
                 </table>
                </div>
            </div>
            
        </div>
    </div>
</div>