<?php

namespace App\Http\Controllers\Restore;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = User::onlyTrashed()->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-green-500 bg-green-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-green-700 focus:outline-none focus:shadow-outline" href="' . route('dashboard.restore.user', $item->id) . '">
                            Restore
                        </a>
                    ';
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.restore.index');
    }

    public function restore($id)
    {
        $data = User::onlyTrashed()->where('id', $id);
        $data->restore();

        // alert
        alert()->success('Berhasil di Pulihkan', 'Data user berhasil dipulihkan!');

        return redirect()->route('dashboard.restore');
    }
}
