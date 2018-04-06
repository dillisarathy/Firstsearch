@include('head')
<div class="container">
    <div class="row">
    @include('menu')
        <div class="col-sm-12">
            <div class="col-sm-offset-3 col-sm-7" style="margin-top:25px">
                <form role="form" action="{{url('/admin/save')}}" method="POST" class="form form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="jobTitle">Job title:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="job_role" id="jobTitle"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="jobDesc">Job Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="job_description" id="jobDesc"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="exp">Experience:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="experience" id="exp"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="qualification">Qualification:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="qualification" id="qualification"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="keyskills">Key Skills:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="key_skills" id="keyskills"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cName">Company Name:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="company_name" id="cName"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cProfile">Company Profile:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="company_profile" id="cProfile"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="address">Address:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="address" id="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="interviewDates">Interview Dates:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="interview_dates" id="interviewDates"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="emailId">Email id:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email_address" id="emailId">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="contact">Contact Number:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="contact_number" id="contact"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="contact">Location :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="location" id="location" value="Chennai">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category">Category:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="cat_id" id="category">
                                <option value="">Select</option>
                            @foreach($categoryDetails as $key => $category)
                                <option value="{{$category->cat_id}}">{{$category->category}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <center><button type="submit" class="btn btn-info">Submit</button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>