<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $data = Employee::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('Action', function ($row) {
                    $editUrl   = '';
                    $deleteUrl = '';

                    return '
                        <div class="text-center d-flex justify-content-center gap-2">
                            <a href="' . $editUrl . '" class="btn btn-outline-primary p-1" title="Edit">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                
                            <form method="POST" action="' . $deleteUrl . '" class="delete-form" onsubmit="return confirm(\'Are you sure?\');">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-outline-danger p-1 rounded" title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['Action'])
                ->make(true);
        }

        return view('pages.employee.index');
    }
}
