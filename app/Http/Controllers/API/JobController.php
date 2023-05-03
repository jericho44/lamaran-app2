<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Interfaces\JobInterface;
use App\Models\Job;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    private $jobInterface;

    public function __construct(JobInterface $jobInterface)
    {
        $this->jobInterface = $jobInterface;
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *   tags={"Api|Job"},
     *   path="/api/job",
     *   summary="Job index",
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
        $jobs = Job::all();

        if ($jobs) {
            return ApiFormatter::createApi(200, 'Success', $jobs);
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
     *     tags={"Api|Job"},
     *     path="/api/job/store",
     *     summary="Job store",
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

        $job = Job::create($validator->validate());

        if ($job) {
            return (new JobResource($job))->additional([
                'status' => [
                    'code' => 200,
                    'message' => 'Data berhasil disimpan'
                ]
            ])->response()->setStatusCode(200);
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
     *     tags={"Api|Job"},
     *     path="/api/job/update/{id}",
     *     summary="Job update",
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

        $job = $this->jobInterface->updateByIdHash(
            id: $id,
            data: $request->all()
        );

        if ($job) {
            return (new JobResource($job))->additional([
                'status' => [
                    'code' => 200,
                    'message' => 'Data berhasil disimpan'
                ]
            ])->response()->setStatusCode(200);
        } else {
            return ApiFormatter::createApi(400, 'Data Tidak Berhasil Diubah', null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     tags={"Api|Job"},
     *     path="/api/job/{id}",
     *     summary="Job delete",
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
        $job = $this->jobInterface->deletedById(
            id: $id
        );

        if ($job) {
            return ApiFormatter::createApi(200, 'Data Berhasil Dihapus', null);
        } else {
            return ApiFormatter::createApi(400, 'Data Tidak Berhasil Dihapus', null);
        }
    }
}
