<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Interfaces\SkillInterface;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    private $skillInterface;

    public function __construct(SkillInterface $skillInterface)
    {
        $this->skillInterface = $skillInterface;
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *   tags={"Api|Skill"},
     *   path="/api/skill",
     *   summary="Skill index",
     *   @OA\Parameter(
     *     name="data",
     *     in="query",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *    response=200,
     *    description="Success"
     *     )
     * )
     */
    public function index()
    {
        $skills = Skill::all();

        if ($skills) {
            return ApiFormatter::createApi(200, 'Success', $skills);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * @OA\Post(
     *     tags={"Api|Skill"},
     *     path="/api/skill/store",
     *     summary="Skill store",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name"},
     *             @OA\Property(property="name", type="string"),
     *         )
     *     ),
     *   @OA\Response(
     *    response=200,
     *    description="Success"
     *     )
     *
     * )
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];

        $message = [];

        $attributes = [
            'name' => 'Nama Kategori'
        ];

        $validator = Validator::make($request->all(), $rules, $message, $attributes);

        if ($validator->fails()) {
            return ApiFormatter::createApi([
                'errors' => $validator->errors()
            ], 'Silahkan isi form dengan benar terlebih dahulu', 422);
        }

        $skill = Skill::create($validator->validate());

        if ($skill) {
            return ApiFormatter::createApi(200, 'Data Berhasil Disimpan', $skill);
        } else {
            return ApiFormatter::createApi(400, 'Data Tidak Berhasil Disimpan', null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *     tags={"Api|Skill"},
     *     path="/api/skill/update/{id}",
     *     summary="Skill update",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name"},
     *             @OA\Property(property="name", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *    response=200,
     *    description="Success"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required'
        ];

        $message = [];

        $attributes = [
            'name' => 'Nama Kategori'
        ];

        $validator = Validator::make($request->all(), $rules, $message, $attributes);

        if ($validator->fails()) {
            return ApiFormatter::createApi([
                'errors' => $validator->errors()
            ], 'Silahkan isi form dengan benar terlebih dahulu', 422);
        }

        // $skill = Skill::create($validator->validate());

        $skill = $this->skillInterface->updateByIdHash(
            id: $id,
            data: $request->all()
        );

        if ($skill) {
            return ApiFormatter::createApi(200, 'Data Berhasil Diubah', $skill);
        } else {
            return ApiFormatter::createApi(400, 'Data Tidak Berhasil Diubah', null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    /**
     * @OA\Delete(
     *     tags={"Api|Skill"},
     *     path="/api/skill/{id}",
     *     summary="Skill delete",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *     @OA\Response(
     *    response=200,
     *    description="Success"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $skill = $this->skillInterface->deletedById(
            id: $id
        );

        if ($skill) {
            return ApiFormatter::createApi(200, 'Data Berhasil Dihapus', $skill);
        } else {
            return ApiFormatter::createApi(400, 'Data Tidak Berhasil Dihapus', null);
        }
    }
}
