<?php

namespace App\Http\Controllers\Swagger\Auth;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/login",
 *     summary="Login",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="User credentials",
 *         @OA\JsonContent(
 *             required={"email","password"},
 *             @OA\Property(property="email", type="string", format="email", example="admintest@mail.ru"),
 *             @OA\Property(property="password", type="string", example="password"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(property="user", type="object",),
 *             @OA\Property(property="token", type="string"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Invalid credentials"),
 *         ),
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/logout",
 *     summary="logout",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="User credentials",
 *         @OA\JsonContent(
 *             required={"email","password"},
 *             @OA\Property(property="token", type="string"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Successfully logged out"),
 *         ),
 *     ),
 * )
 */

class AuthController extends Controller
{

}
