@include('head')
<div class="container">
    <div class="row">
    @include('menu')
    
        <div class="col-sm-12" style="margin-top:25px;">
        <div class="col-sm-10">
            <table class="table table-hover">
            <thead class="bg-info">
                <tr>
                    <th>S.no</th>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Job type</th>
                    <th>Location</th>
                    <th>Posted Date</th>
                </tr>
            </thead>
            <tbody>
            @foreach($jobDetails as $key => $jobDetail)
                <tr>
                    <td>{{ $jobDetails->firstItem() + $key}} </td>
                    @if(session()->has('userId'))
                    <td><a href="job_{{$jobDetail->job_id}}" title="To see the venue ">{{$jobDetail->job_role}}</a></td>
                    @else
                    <td><a href="" data-toggle="modal" data-target="#myModal" data-id="{{$jobDetail->job_id}}" title="To see the venue">{{$jobDetail->job_role}}</a> </td>
                    @endif
                    <td>{{$jobDetail->company_name}}</td>
                    <td>{{$jobDetail->category}}</td>
                    <td> {{$jobDetail->location}} </td>
                    <td> {{date(' l d-M-y', strtotime($jobDetail->created_at))}}</td>
                </tr>
            @endforeach
          
            </tbody>
            </table>
            <center>
            {{$jobDetails->links()}}
            </center>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login/Registration</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" id="loginTab" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab" id="registerTab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal" action="{{url('/login')}}" method="POST">
                                {{ csrf_field() }}
                                @if ($errors->login->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->login->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <input type="hidden" id="job_id" name="job_id" value="">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" style="margin-bottom:15px" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="margin-bottom:15px"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Submit</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal" method="POST" id ="form2" name="form2" action="{{url('/register')}}">
                                {{ csrf_field() }}
                                @if ($errors->register->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->register->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <input type="hidden" id="job_id_register" name="job_id_register" value=""> 
                                <div class="form-group required">
                                    <label for="name" id="nameLabel" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option>Mr.</option>
                                                    <option>Ms.</option>
                                                    <option>Mrs.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Full name" style="margin-bottom:15px"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="email" id="emailLabel" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Email" style="margin-bottom:15px" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="degree" id="degreeLabel" class="col-sm-2 control-label">
                                        Education Qualification</label>
                                    <div class="col-sm-10" style="margin-bottom:15px">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control" name="degree" id="degree">
                                                    <option value="">Select</option>
                                                @foreach($degreeDetails as $key => $degree)
                                                    <option value="{{$degree->degree_id}}">{{$degree->degree}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control"  name="department" id="department">
                                                
                                                </select>
                                            </div>
                                       </div> 
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="yop" id="yopLabel" class="col-sm-2 control-label">
                                        Passed Out</label>
                                    <div class="col-sm-10" style="margin-bottom:15px">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control" name="yop" id="yop">
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                </select>
                                            </div>
                                            
                                       </div> 
                                    </div>
                                </div>
                                
                                <div class="form-group required">
                                    <label for="mobile" id="mobileLabel" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{old('mobile')}}" name="mobile" class="form-control" id="mobile" placeholder="Mobile" style="margin-bottom:15px" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="address" id="addressLabel" class="col-sm-2 control-label">
                                        Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="address" rows="5" id="address" placeholder="Address" style="margin-bottom:15px">{{old('address')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="password" id="passwordLabel" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password"  class="form-control" id="password" placeholder="Password" style="margin-bottom:15px"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" id="submit" class="btn btn-primary btn-sm">
                                            Save & Continue</button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>