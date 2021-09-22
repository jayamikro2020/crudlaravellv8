<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request -> has('search')){
            $data = Employee::where('nama','LIKE', '%'.$request -> search.'%') -> paginate(5);
        }else{
        $data = Employee::paginate(5);
        
        }
        return view('employee.index', compact('data'));
            
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Employee::create($request -> all());
        // return redirect()->route('index')->with('success','Data Berhasil ditambahkan');
        if($request -> hasFile('foto')){
            $request -> file('foto') -> move('foto/', $request -> file('foto') -> getClientOriginalName());
            $data -> foto = $request -> file('foto') -> getClientOriginalName();
            $data -> save();
        }
        return redirect()->route('index')->with('success','Data Berhasil di Tambahkan');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = Employee::find($id);
        return view('employee.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Employee::find($id);
        $data -> update ($request -> all());

        return redirect()->route('index')->with('success','Data Berhasil di update');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::find($id);
        $data -> delete();

        return redirect()->route('index')->with('success','Data Berhasil di hapus');
  
    }
    public function exportpdf(){
        $data = Employee::all();
        view() -> share ('data', $data);
        $pdf = PDF::loadview('/employee/index-pdf');
        return $pdf -> download ('data.pdf');
    }
    public function  exportexcel(){
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }
    public function importexcel(Request $request){
        $data = $request -> file('file');

        $namafile = $data -> getClientOriginalName();
        $data -> move('EmployeeData', $namafile);
        
        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'. $namafile));
        return \redirect() -> back();
    }
}
