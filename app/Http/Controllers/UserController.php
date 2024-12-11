<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\UserSearchService;
use App\Http\Controllers\DiscordWebhookController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //protegemos la ruta

    protected $discordWebhookController;
    protected $userSearchService;

    public function __construct(DiscordWebhookController $discordWebhookController, UserSearchService $userSearchService)
    {
        $this->discordWebhookController = $discordWebhookController;
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
        User::create($data);
        $this->discordWebhookController->sendNewUserMessage($user->name, $user->lastname, $user->email);
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
}
