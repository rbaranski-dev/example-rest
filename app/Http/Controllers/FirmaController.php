<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponse;
use App\Interfaces\FirmaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class FirmaController extends Controller
{
    public FirmaRepositoryInterface $firmaRepository;

    public function __construct(FirmaRepositoryInterface $firmaRepository)
    {
        $this->firmaRepository = $firmaRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::sendResponse($this->firmaRepository->index());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return ApiResponse::throw($validator->errors(), $validator->errors());
        }

        try {
            $firma = $this->firmaRepository->store($request->all());

            return ApiResponse::sendResponse($firma, 'Firma Create Successful', 201);

        } catch (\Exception $e) {
            return ApiResponse::throw($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $firma = $this->firmaRepository->getById($id);

        return ApiResponse::sendResponse($firma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return ApiResponse::throw($validator->errors(), $validator->errors());
        }

        try {
            $firma = $this->firmaRepository->update($request->all(), $id);

            return ApiResponse::sendResponse($firma, 'Firma Update Successful', 200);

        } catch (\Exception $e) {
            return ApiResponse::throw($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }

    /**
     * Summary of getValidator
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Validation\Validator
     */
    private function getValidator(Request $request): Validator
    {
        return \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nazwa' => 'required|string|max:255',
            'nip' => 'required|string|max:20',
            'adres' => 'required|string|max:100',
            'miasto' => 'required|string|max:100',
            'kod_pocztowy' => 'required|string|max:6',
        ]);
    }
}
