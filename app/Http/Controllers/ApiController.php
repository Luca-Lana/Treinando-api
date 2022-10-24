<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Student;

class ApiController extends Controller
{   
    /**
     * Get all students
     *
     * @return JsonResponse
     */
    public function getAllStudents() : JsonResponse
    {
        return response()->json(Student::all(), 200);
    }
    /**
     * Get one student
     *
     * @param Int $id
     * @return JsonResponse
     */
    public function getStudent(Int $id) : JsonResponse
    {
        if ($student = Student::find($id)) {
            return response()->json($student, 200);
        }
        return response()->json(['message' => 'Student not found'], 404);
    }
    /**
     * Create a new student
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createStudent(Request $request) : JsonResponse
    {   
        Student::create($request->all());
        return response()->json(['message' => 'Student record create'], 201);
    }

    /**
     * Update a new Student
     *
     * @param Request $request
     * @param Int $id
     * @return JsonResponse
     */
    public function updateStudent(Request $request, Int $id) : JsonResponse
    {
        if ($student = Student::find($id)) {
            $student->update($request->all());
            return response()->json(["message" => "Records updated successfully"], 200);
        }
        return response()->json(['message' => 'Student not found'], 404);
    }
    /**
     * Delete a student
     *
     * @param Int $id
     * @return JsonResponse
     */
    public function deleteStudent(Int $id) : JsonResponse
    {
        if ($student = Student::find($id)) {
            $student->delete();
            return response()->json(["message" => "Records deleted successfully"], 200);
        }
        return response()->json(['message' => 'Student not found'], 404);
    }
}
