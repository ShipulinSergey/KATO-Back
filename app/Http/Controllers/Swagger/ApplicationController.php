<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\POST(
 *     path="/api/application/",
 *     summary="store",
 *     tags={"Application"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="surname", type="string"),
 *             @OA\Property(property="lastname", type="string"),
 *             @OA\Property(property="position", type="string"),
 *             @OA\Property(property="email", type="string", format="email"),
 *             @OA\Property(property="phone", type="string"),
 *             @OA\Property(property="job", type="string"),
 *             @OA\Property(property="form", type="integer", enum={1, 2, 3, 4, 5}),
 *             @OA\Property(property="in_kata", type="integer", enum={0, 1}),
 *             @OA\Property(property="notify", type="integer", enum={0, 1}),
 *             @OA\Property(property="сonsent_status", type="integer", enum={0, 1}),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Form submitted successfully")
 *         )
 *     )
 * )
 */

class ApplicationController extends Controller
{
    //
}
