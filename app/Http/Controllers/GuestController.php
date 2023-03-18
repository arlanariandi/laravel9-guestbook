<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Models\Guest;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Guest::query()->orderBy('created_at', 'desc');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-green-500 bg-green-500 text-white rounded-md px-4 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-green-700 focus:outline-none focus:shadow-outline" href="' . route('dashboard.guest.edit', $item->id) .
                        '">
                            Edit
                        </a>

                        <a class="inline-block border border-green-500 bg-green-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-green-800 focus:outline-none focus:shadow-outline"
                            href="' .
                        route('dashboard.guest.show', $item->id) .
                        '">
                            Show
                        </a>

                        <form class="inline-block" action="' .
                        route('dashboard.guest.destroy', $item->id) .
                        '" method="POST">
                            <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-red-800 focus:outline-none focus:shadow-outline" onclick="return confirm(`Apakah kamu yakin akan menghapus data ini?`)"
                             >
                                Delete
                            </button>
                            ' .
                        method_field('delete') .
                        csrf_field() .
                        '
                        </form>
                    ';
                })
                ->editColumn('created_at', function ($item) {
                    return $item->created_at->format('d M Y - H:i');
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.guest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.guest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuestRequest $request)
    {
        $data = $request->all();

        Guest::create($data);

        // alert
        alert()->success('Berhasil di Simpan', 'Data tamu berhasil disimpan!');

        return redirect()->route('dashboard.guest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        return view('pages.guest.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('pages.guest.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(GuestRequest $request, Guest $guest)
    {
        $data = $request->all();
        $guest->update($data);

        // alert
        alert()->success('Berhasil di Perbaharui', 'Data tamu berhasil diperbaharui!');

        return redirect()->route('dashboard.guest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();

        // alert
        alert()->success('Berhasil di Hapus', 'Data tamu berhasil dihapus!');

        return redirect()->route('dashboard.guest.index');
    }

    public function cetak()
    {
        $guest = Guest::all();

        // return view('pages.guest.pdf', compact('guest'));

        $detail = ['guest' => $guest];
        $pdf = FacadePdf::loadView('pages.guest.pdf', $detail);
        return $pdf->download('laporan-tamu.pdf');
    }

    // public function cetakpdf()
    // {
    //     $data = Guest::all();

    //     $detail = ['data' => $data];
    //     $pdf = FacadePdf::loadView('pages.guest.pdf', $detail);
    //     return $pdf->download('laporan-tamu.pdf');
    // }
}
