<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data = Department::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('Action', function ($row) {
                    $editUrl   = '';
                    $deleteUrl = '';

                    return '
                        <div class="text-center flex justify-center gap-2">
                            <a href="' . $editUrl . '" class="btn-primary-form px-2 py-1 rounded bg-blue-600 text-white hover:bg-blue-700 transition" title="Edit">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                
                            <form method="POST" action="' . $deleteUrl . '" class="delete-form" onsubmit="return confirm(\'Are you sure?\');">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn-danger-form px-2 py-1 rounded bg-red-600 text-white hover:bg-red-700 transition" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['Action'])
                ->make(true);
        }

        return view('pages.department.index');
    }
}
