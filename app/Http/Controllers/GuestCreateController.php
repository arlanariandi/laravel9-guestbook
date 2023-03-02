<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestCreateController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(GuestRequest $request)
    {
        $data = $request->all();

        Guest::create($data);

        // alert
        alert()->success('Berhasil di Simpan', 'Data tamu berhasil disimpan!');

        return redirect()->route('create');
    }
}
