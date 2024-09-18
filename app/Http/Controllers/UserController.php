<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private Log $logger
    )
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.cache_locks
     */
    public function saveUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->pesel = $request->pesel;
        $user->nip = $request->nip;
        $user->active = $request->active;
        $user->save();
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function getUser(Request $request, int $idUser)
    {
        Log::info("Get User. IP: " . $request->ip() .". User ID: " . $idUser);
        $user = new User();
        $res = $user->getById($idUser);
        return response()->json($res);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
