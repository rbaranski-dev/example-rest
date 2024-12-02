<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponse;
use App\Interfaces\FirmaRepositoryInterface;
use App\Interfaces\PracownikRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class PracownikController extends Controller
{

    public FirmaRepositoryInterface $firmaRepository;
    public PracownikRepositoryInterface $pracownikRepository;

    public function __construct(FirmaRepositoryInterface $firmaRepository, PracownikRepositoryInterface $pracownikRepository)
    {
        $this->pracownikRepository = $pracownikRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::sendResponse($this->pracownikRepository->index());
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
            $firma = $this->pracownikRepository->store($request->all());

            return ApiResponse::sendResponse($firma, 'Pracownik Create Successful', 201);

        } catch (\Exception $e) {
            return ApiResponse::throw($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
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
            $firma = $this->pracownikRepository->update($request->all(), $id);

            return ApiResponse::sendResponse($firma, 'Pracownik Update Successful', 200);

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
            'imie' => 'required|string|max:100',
            'nazwisko' => 'required|string|max:20',
            'email' => 'required|string|email|max:100',
            'telefon' => 'string|phone:PL',
            'firma_id' => 'required|integer',
        ]);
    }
}
