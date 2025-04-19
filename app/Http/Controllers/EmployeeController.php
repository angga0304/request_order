<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Employee::all()->map(function ($data) {
            $data->dept = $data->department->name;
            return $data;
        });
        return Inertia::render('Employee/Index', ['lists' => $lists]);
    }
}
