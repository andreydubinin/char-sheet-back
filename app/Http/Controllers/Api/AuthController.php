<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'registration']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'login'    => $request->input('login'),
            'password' => $request->input('password'),
        ];

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'message' => __('auth.User has registered'),
            'token'   => $token,
            'user'    => new UserResource(Auth::guard()->user()),
            'userID'  => Auth::id(),
        ], 200);
    }

    /**
     * User registration
     *
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     * @throws \Throwable
     */
    public function registration(RegisterRequest $request)
    {
        $login    = request('login');
        $password = request('password');
        $phone    = request('phone');

        try {
            DB::beginTransaction();

            $user           = new User();
            $user->login    = $login;
            $user->phone    = $phone;
            $user->password = Hash::make($password);
            $user->save();

            $token = JWTAuth::fromUser($user);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Ошибка создания пользователя!',
                'error'   => $exception->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => __('auth.User has registered'),
            'token'   => $token,
            'user'    => new UserResource($user),
            'userID'  => $user->id,
        ], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $token = JWTAuth::getToken();

        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 403);
        }
        try {
            $refreshedToken = JWTAuth::refresh($token);
        } catch (JWTException $e) {
            return response()->json([
                'message' => 'Not able to refresh Token',
            ], 400);
        }

        return response()->json([
            'token' => $refreshedToken,
        ]);
    }
}
