<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\students;
use App\Models\countrise;
use App\Models\Students as ModelsStudents;
use Illuminate\Http\Request;

class StundetController extends Controller
{
    public function index()
    {
        session()->put('locale','ar');
        $data = Students::all();
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->country_name = countrise::where('id', '=', $info->country_id)->value('name');
            }
        }
        return view('students.index', ['data' => $data]);
    }

    public function create()
    {
        $countries = countrise::select("id", "name")->where("active", 1)->get();
        return view('students.create', ['countries' => $countries]);
    }

    public function store(CreateStudentRequest $request)
    {


        $counter = Students::where('name', '=', $request->name)->count();
        if ($counter > 0) {
            return redirect()->back()->with(['error' => 'عفوا الاسم مسجل من قبل '])->withInput();
        }
        $student = new Students();
        $student->name = $request->name;
        $student->country_id = $request->country_id;
        $student->phone = $request->phone;
        $student->nationalID = $request->nationalID;
        $student->address = $request->address;
        $student->notes = $request->notes;
        $student->active = $request->active;
        //upload image
        if ($request->has('photo')) {
            $image = $request->photo;
            $extension = strtolower($image->getClientOriginalExtension());
            $filenname = time() . rand(1, 1000) . "." . $extension;
            $image->move("uploads", $filenname);
            $student->image = $filenname;
        }

        $student->save();


        return redirect()->route('student.index')->with(['success' => 'تم اضافة البيانات بنجاح ']);
    }


    public function edit($id)
    {
        $data = Students::find($id);
        if (empty($data)) {
            return redirect()->route('student.index')->with(['error' => 'عفوا غير قادر للوصول للبيانات المطلوبة']);
        }

        $countries = countrise::select("id", "name")->where("active", 1)->get();
        return view('students.edit', ['data' => $data, 'countries' => $countries]);
    }

    public function update($id, CreateStudentRequest $request)
    {
        $dataStudents = Students::find($id);
        if (empty($dataStudents)) {
            return redirect()->route('student.index')->with(['error' => 'عفوا غير قادر للوصول للبيانات المطلوبة']);
        }
        $dataStudents->name = $request->name;
        $dataStudents->country_id = $request->country_id;
        $dataStudents->phone = $request->phone;
        $dataStudents->nationalID = $request->nationalID;
        $dataStudents->address = $request->address;
        $dataStudents->notes = $request->notes;
        $dataStudents->active = $request->active;

        if ($request->has('photo')) {
            $image = $request->photo;
            $extension = strtolower($image->getClientOriginalExtension());
            $filenname = time() . rand(1, 1000) . "." . $extension;
            $image->move("uploads", $filenname);
            $dataStudents->image = $filenname;
        }

        $dataStudents->save();
        return redirect()->route('student.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
    }

    public function destroy($id)
    {
        $dataStudents = Students::find($id);
        if (empty($dataStudents)) {
            return redirect()->route('student.index')->with(['error' => 'عفوا غير قادر للوصول للبيانات المطلوبة']);
        }
        $dataStudents->delete();
        return redirect()->route('student.index')->with(['success' => 'تم الحذف البيانات بنجاح']);
    }

    public function ajax_search_student(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->name;
            $data = Students::where('name', 'like', "%{$name}%")->get();

            if (!empty($data)) {
                foreach ($data as $info) {
                    $info->country_name = countrise::where('id', '=', $info->country_id)->value('name');
                }
            }

            return view('students.ajax_search_student', ['data' => $data]);
        }
    }
}
