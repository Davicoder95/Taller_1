<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\UserSearchService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //protegemos la ruta

    protected $userSearchService;

    public function __construct(UserSearchService $userSearchService)
    {
        $this->userSearchService = $userSearchService;
    }


    public function index(Request $request)
    {
        $search = $request->query('search');
        $users = $this->userSearchService->searchUsers($search);
        return view('user.index',compact ('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries= Country::all();
        return view('user.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserFormRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        //contraseña generada en base a el name y lastname del user
        $name = Str::lower(str_replace(' ', '', $data['name']));// se eliminan los espacion para evitar conflictos
        $lastname = Str::lower(str_replace(' ', '', $data['lastname']));
        $password = $name . $lastname;
        // Asignar la contraseña generada al array de datos
        $data['password'] = Hash::make($password);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //dd($user);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $countries=Country::all();
        return view('user.edit',compact('user','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFormRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.index')->with('success', 'Usuario editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado');
    }
    //exportar datos a un excel

}
