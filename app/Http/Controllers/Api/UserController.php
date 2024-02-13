<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Get list of users",
     *     @OA\Response(response="200", description="List of users")
     * )
     */
    public function index()
    {
        $users = User::all();
        $nbre =User::count();
        // return response()->json($users);
        return view('welcome',compact('users','nbre'));
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Create a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email","password"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string")
     *         )
     *     ),
     *     @OA\Response(response="201", description="User created successfully"),
     *     @OA\Response(response="422", description="Validation error")
     * )
     */

    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|string'
            // Autres règles de validation...
        ]);

        // Vérification de la validation
        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            return redirect('/')->with('fail',$validator->errors());
        }

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password'=>$request->input('password')
            // Autres champs de l'utilisateur...
        ]);

        // Retourner une réponse
        // return response()->json($user, 201);
        return redirect('/')->with('success','User add successfully');
    }

    public function getForm()
    {
        return view('user');
    }


}
