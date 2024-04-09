<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Student extends Model
{
    use HasFactory;
    protected $table = 'Students';

    public function getAllStudent(){
        $students = DB::select('SELECT * FROM students');
        return $students;
    }

    public function postAdd($data)
    {
        $users = DB::select('INSERT INTO students (name,phone_number) VALUES (?,?)', $data);
        return $users;
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM students WHERE id= ?', [$id]);
    }

    public function postEdit($data, $id)
    {
        DB::table('students')
        ->where('id', $id)
        ->update([
            'name' => $data['name'],
            'phone_number' => $data['phone_number']
        ]);
    return redirect()->back()->with('msg', 'Cập nhật thành công');
    }

    public function deleteStudent($id)
    {
        return  DB::delete("DELETE FROM students WHERE id=? ", [$id]);
    }
}
