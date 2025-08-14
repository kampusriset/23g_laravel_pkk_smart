<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index() {

        $residents = Resident::all();

        return view('pages.resident.index', compact('residents'));
    }

    public function create() {
        return view('pages.resident.create');
    }

    public function store(Request $request) {

        $request->validate([
            'nik' => 'required|max:16',
            'name' => 'required|max:100',
            'gender' => 'required',
            'birth_date' => 'required|string',
            'birth_place' => 'required|max:100',
            'address' => 'required|max:700',
            'religion' => 'nullable|max:50',
            'marital_status' => 'required',
            'occupation' => 'nullable|max:100',
            'phone' => 'nullable|max:15',
            'status' => 'required',
        ]);

        Resident::create([
            'nik'=> $request->nik,
            'name'=> $request->name,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'birth_place' => $request->birth_place,
            'address' => $request->address,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'occupation' => $request->occupation,
            'phone' => $request->phone,
            'status' => $request->status
        ]);

        return redirect('/resident');
    }

    public function edit($id) {
        $resident = Resident::findOrFail($id);

        return view('pages.resident.edit', [
            'resident' => $resident,
        ]);
    }


    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'nik' => 'required|max:16',
            'name' => 'required|max:100',
            'gender' => 'required',
            'birth_date' => 'required|string',
            'birth_place' => 'required|max:100',
            'address' => 'required|max:700',
            'religion' => 'nullable|max:50',
            'merital_status' => 'required',
            'occupation' => 'nullable|max:100',
            'phone' => 'nullable|max:15',
            'status' => 'required',
        ]);

        Resident::findOrFail($id)->update($validatedData);

        return redirect('/resident')->with('success', 'Berhasil mengubah data');
    }

    public function destory($id) {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }
}
