<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
//use App\Models\students;
use App\Models\types;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $numberOfRecord = students::count();
        $perPage = 5;
        $numberOfPage = $numberOfRecord % $perPage == 0?
            (int) $numberOfRecord / $perPage: (int) $numberOfRecord / $perPage + 1;
        $pageIndex = 1;
        if($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
        if($pageIndex < 1) $pageIndex = 1;
        if($pageIndex > $numberOfPage) {
            $pageIndex = $numberOfPage;
        }

        //
        $students = students::orderByDesc('id')
            ->skip(($pageIndex-1)*$perPage)
            ->take($perPage)
            ->get();
        // dd($arr);
        return view('students.index', compact( 'students', 'numberOfPage', 'pageIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = students::all();
        $types = types::all();
        return view('students.create',compact('types' , 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','max:50'],
            'gender' => ['required'],
            'birthday' => ['required', 'date', 'before_or_equal:'.now()],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' =>['required' , 'numeric', 'digits:10'],
            'type_id' => ['required'],
            'email' =>['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // success
        $student = students::create($request->all());
        return redirect()->route('students.index' , compact('student'))->with('mes', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(students $student)
    {
        return view('students.show' , compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(students $student)
    {
        $students = students::all();
        $types =types::all();
        return view('students.edit' , compact('student','students' , 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $student)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','max:50'],
            'gender' => ['required'],
            'birthday' => ['required', 'date', 'before_or_equal:'.now()],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' =>['required' , 'numeric', 'digits:10'],
            'email' =>['required'],
            'type_id' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // success
        $student->update($request->all());
        return redirect()->route('students.index' , compact('student'))->with('mes', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $student)
    {
        $student->delete();
        return redirect()->route('students.index', $student);
    }
}
