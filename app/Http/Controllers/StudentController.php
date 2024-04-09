<?php

namespace App\Http\Controllers;

use App\Models\CrudModels;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $students;
    public function __construct()
    {
        $this ->students = new Student();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm học sinh';
        return view('create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'phoneNumber' => 'required|numeric'
        ],[
            'name.required' => 'Bạn phải nhập thông tin vào ô',
            'name.min' => 'Bạn phải nhập trên :min',
            'phoneNumber.required' => 'Bạn phải nhập thông tin vào ô',
            'phoneNumber.numeric' => 'Bạn phải nhập số không được nhập chữ'
        ]);
        $data = [
            $request->name,
            $request->phoneNumber
        ];
        $this->students->postAdd($data);
        return redirect()->route('index')->with('msg','Thêm người dùng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id = 0)
    {
        $title = 'Chỉnh sửa thông tin ';
        if(!empty($id)){
            $StudentDetails = $this->students->getDetail($id);
            if(!empty($StudentDetails)){
                $request->session()->put('id',$id);
                $StudentDetails = $StudentDetails[0];
            }
            else {
                return redirect()->route('index')->with('msg','Người dùng không tồn tại');
            }
        }
        return view('update',compact('StudentDetails','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = session('id');
        if(empty($id)){
            return back()->with('msg','ID không tồn tại');
        }
    
        $request->validate([
            'name' => 'required|min:5',
            'phone_number' => 'required|numeric'
        ],[
            'name.required' => 'Bạn phải nhập thông tin vào ô',
            'name.min' => 'Bạn phải nhập trên :min ký tự',
            'phone_number.required' => 'Bạn phải nhập thông tin vào ô',
            'phone_number.numeric' => 'Bạn phải nhập số không được nhập chữ'
        ]);
    
        $data = [
            'name' => $request->name,
            'phone_number' => $request->phone_number
        ];
    
        $this->students->postEdit($data, $id);
    
        return redirect()->route('index')->with('msg', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = $this->students->destroy($id);
        
        if ($delete) {
            return redirect()->route('index')->with('msg','Xóa người dùng thành công');
        } else {
            return redirect()->route('index')->with('msg','Không tìm thấy người dùng để xóa');
        }
    }
}
