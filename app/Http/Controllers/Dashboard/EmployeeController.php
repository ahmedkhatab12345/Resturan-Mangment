<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
class EmployeeController extends Controller
{
    use UploadTrait;
    public function index()
    {
        $employees = Employee::all();
        return view('dashboard.employees.index',compact('employees'));
    }

    public function create()
    {
        return view('dashboard.employees.create');
    }

    public function store(Request $request)
    {
        try {
            //save photo
            $file_name=$this ->saveImage($request->photo,'images/dashboard/employees');
            //fetch data
            $employees = $request->all();
            //store data
            $employees = Employee::create([              
                'name'=> $employees['name'],
                'position'=> $employees['position'],
                'salary'=> $employees['salary'],
                'photo'=>$file_name,
            ]);
            return redirect()->route('employees.index')->with('success', 'Employees added successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error adding Employees: ' . $e->getMessage())->withInput();
            }
    }

    public function edit($id)
    {
        $employees = Employee::find($id);
        if (!$employees) {
            return redirect()->route('employees.index')->with(['error' => 'This Employee Is Not Found']);
        }

        return view('dashboard.employees.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $employees = Employee::find($id);
        
            if (!$employees) {
                return redirect()->route('employees.index')->with('error', 'Employee not found');
            }
        
            // Check if the request has an image
            if ($request->hasFile('photo')) {
                // Delete the old image
                if ($employees->photo) {
                    Storage::delete($employees->photo);
                }
        
                // Save the new image
                $file_name = $this->saveImage($request->photo, 'images/dashboard/employees');
        
                // Update the employees with the new image
                $employees->update([
                    'photo' => $file_name,
                ]);
            }
        
            // Update other data
            $employees->update([
                'name' => $request->name,
                'position' => $request->position,
                'salary' => $request->salary,
            ]);
        
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating Employee: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $employees = Employee::destroy($id);
        if ($employees) {
            return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
        } else {
            return redirect()->route('employees.index')->with('error', 'Employee not found');
        }
    }
}
