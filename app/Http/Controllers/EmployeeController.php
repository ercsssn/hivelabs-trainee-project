<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Employee;
use App\EmployeePayment;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
        return view('employee.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depts = Department::all();
        return view('employee.create', ['depts' => $depts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Employee;

        $imgPath = $request->file('photo')->store('uploads/');

        $data->full_name     = $request->full_name;
        $data->department_id = $request->department_id;
        $data->photo         = $imgPath;
        $data->bio           = $request->bio;
        $data->salary_type   = $request->salary_type;
        $data->salary_amt    = $request->salary_amt;

        $data->save();

        return redirect('admin/employee/create')->with('success','Employee has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::find($id);
        return view('employee.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depts = Department::all();
        $data = Employee::find($id);
        return view('employee.edit', ['data'=>$data, 'depts' => $depts  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Employee::find($id);

        if ($request->hasFile('photo')) {
            $imgPath = $request->file('photo')->store('uploads/');
        }else {
            $imgPath = $request->prev_photo;
        }

        $data->full_name     = $request->full_name;
        $data->department_id = $request->department_id;
        $data->photo         = $imgPath;
        $data->bio           = $request->bio;
        $data->salary_type   = $request->salary_type;
        $data->salary_amt    = $request->salary_amt;

        $data->save();

        return redirect('admin/employee/'.$id.'/edit')->with('success','Employee has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();

        return redirect('admin/employee/')->with('success','Employee has been deleted.');
    }

    // Add Payment

    function add_payment($employee_id) 
    {
        return view('employeepayment.create',['employee_id'=>$employee_id]);
    }

    function save_payment(Request $request, $employee_id) 
    {
        $data = new EmployeePayment;

        $data->employee_id   = $request->employee_id;
        $data->amount        = $request->amount;
        $data->payment_date  = $request->amount_date;

        $data->save();

        return redirect('admin/employee/payment/'.$employee_id.'/add')->with('success','Data has been added.');

    }
}

