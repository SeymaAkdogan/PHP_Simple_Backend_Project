<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request): JsonResponse
    {
        $user = [
            'firstname'   => $request->firstname,
            'lastname'    => $request->lastname,
            'username'    => $request->username,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
        ];
        return response()->json([
            'data' => $this->userRepository->register($user),
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $user = User::where('username', $request->username)->first();
        if ($user) {

            if (Hash::check($request->password, $user['password'])) {
                $this->userRepository->login($user);
                $request->session()->regenerate();
                return response()->json([
                    'user' => $user
                ]);
            }else {
                $returnData = array(
                    'status' => 'error',
                    'message' => 'Wrong Password'
                );
                return Response::json($returnData, 500);
            }
        }else{
            $returnData = array(
                'status' => 'error',
                'message' => 'User Not Fount'
            );
            return Response::json($returnData, 500);
        }
    }

    public function logout(Request $request): JsonResponse
    {

        $this->userRepository->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $returnData = array(
            'status' => 'success',
            'message' => 'Logout Successful'
        );
        return response()->json(['data'=>$returnData]);
    }

    public function update(Request $request): JsonResponse
    {
        $userId = $request->route('id');
        $user = $request->only([
            "username",
            "firstname",
            "lastname",
            "email",
            "password"
        ]);

        return response()->json([
            'data' => $this->userRepository->updateUser($userId, $user)
        ]);
    }

}
