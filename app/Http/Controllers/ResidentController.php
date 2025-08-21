<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'marital_status' => 'required',
            'occupation' => 'nullable|max:100',
            'phone' => 'nullable|max:15',
            'status' => 'required',
        ]);

        Resident::findOrFail($id)->update($validatedData);

        return redirect('/resident')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id) 
    {
    $resident = Resident::findOrFail($id);
    $resident->delete();

    return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }

    public function registerLink(){
        return view ('pages.resident.login');
    }

    public function actionRegister(Request $request){
        $incomingFields = $request->validate([
        'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => 'required'
    ], [
        'name.required' => 'Nama wajib diisi.',
        'name.min' => 'Nama minimal 3 karakter.',
        'name.max' => 'Nama maksimal 10 karakter.',
        'name.unique' => 'Nama sudah terdaftar, silakan gunakan yang lain.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar, silakan gunakan yang lain.',
        'password.required' => 'Password wajib diisi.'
    ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/login');
    }

    public function loginLink(){
        return 'anda telah berhasil register silahkan login';
    }

    public function actionLogin(Request $request){
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt([
            'name' => $incomingFields['loginname'],
            'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect ('/register');
    }

    public function calendar(){
        return view('pages.resident.calendar');
    }

}
