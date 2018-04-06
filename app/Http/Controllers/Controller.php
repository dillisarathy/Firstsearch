<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Auth;
use App\Jobdetail;
use App\Educationdetail;
use App\Department;
use App\User;
use App\Category;
use Hash;
use DB;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homePage()
    {
       // $jobDetails = Jobdetail :: all();
        $degreeDetails = Educationdetail :: all();

        $jobDetails = DB::table('jobdetails')
            ->join('categories', 'categories.cat_id', '=', 'jobdetails.cat_id')
            ->select('jobdetails.*', 'categories.category')
            ->orderBy('created_at','desc')->paginate(2);
            //->get();
        // return $jobDetails;
        // return view('index',array('jobDetails' => $tagDetail));
        // $user = Modal name::paginate(2);
        return view('index',array("jobDetails"=>$jobDetails,"degreeDetails"=>$degreeDetails));
    }

    public function category($category,Request $request)
    {
        $sessionCheck = $request->session()->get('userId');
        if(!$sessionCheck)
            return redirect('/');

        $condition = "";
        if($category == 'soft')
            $condition = '1';
        else if($category == 'bpo')
            $condition = '2,8,6';
        else if($category == 'hr')
            $condition = '3';
        else if($category == 'account')
            $condition = '14,11';
        else 
            $condition = '13,12';
        
        $jobDetails = DB::table('jobdetails')
            ->join('categories', 'categories.cat_id', '=', 'jobdetails.cat_id')
            ->select('jobdetails.*', 'categories.category')
            ->where('categories.cat_id','=',$condition)->paginate(2);
            //->get();

        $degreeDetails = Educationdetail :: all();
        // return $jobDetails;
        // return view('index',array('jobDetails' => $tagDetail));
        // $user = Modal name::paginate(2);
        return view('index',array("jobDetails"=>$jobDetails,"degreeDetails"=>$degreeDetails));
    }

    public function description($id,Request $request)
    {
        $sessionCheck = $request->session()->get('userId');
        if(!$sessionCheck)
            return redirect('/');

        $jobDetails = Jobdetail :: find($id)->get();
        $jobDetails = DB::table('jobdetails')
            ->select('jobdetails.*')
            ->where('jobdetails.job_id', '=', $id)
            ->get();
        // return $jobDetails;
        return view('jobDescription',array("jobDetail"=>$jobDetails));
    }

    public function department(Request $request)
    {
        $department= Department::where('degree_id', $request->id)->pluck('department_name', 'department_id');
        return $department;
    }

    public function registration(Request $request)
    {
        //Getting the hidden value form registration form
        $jobId =  Input::get('job_id_register');

        $validator = Validator::make($request->all(),[
            'name' => 'required|regex:/^[a-zA-Z ]+$/u',
            'email' => 'required|email|unique:users,email',
            'degree' => 'required',
            'department' => 'required',
            'yop' => 'required',
            'mobile' => 'required|max:10|min:10',
            'address' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('/')
                    ->withErrors($validator,"register")
                    ->withInput();
        }
        $input = $request->all();

        $user = User::create($request->all());
        session()->put('userId',$user->user_id);
        return redirect('job_'.$jobId);
    }

    public function login(Request $request)
    {
        $uname = Input::get('email');
        $password = Input::get('password');
        $jobId = Input::get('job_id');
        $validator = Validator::make($request->all(),[
            'email' => 'required | email',
            'password' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect('/')
                    ->withErrors($validator,"login")
                    ->withInput();
        }
        if (Auth::attempt(array('email' => $uname, 'password' => $password))){
            $userId = Auth::user()->user_id;
            session()->put('userId',$userId);
            return redirect('job_'.$jobId);
        }
        else {        
            return redirect('/')
                    ->withErrors("invalid","login")
                    ->withInput();
            
        }
    }

    public function adminJobInsertion(Request $request)
    {
        $sessionCheck = $request->session()->get('userId');
        if(!$sessionCheck || !in_array($sessionCheck,array(11)))
            return redirect('/');
        $categoryDetails = Category :: all();
        return view('jobForm',array("categoryDetails"=>$categoryDetails));
    }

    public function adminJobSave(Request $request)
    {
        $input = $request->all();
        $user = Jobdetail::create($request->all());
        return redirect('admin/form');
    }

    public function adminLogin(Request $request)
    {
        $sessionCheck = $request->session()->get('userId');
        if(isset($sessionCheck) && in_array($sessionCheck,array(11)))
            return redirect('admin/form');
        return redirect('/');
    }
}
