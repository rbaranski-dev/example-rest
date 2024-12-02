<?php

namespace App\Repositories;

use App\Interfaces\FirmaRepositoryInterface;
use App\Models\Firma;

class FirmaRepository implements FirmaRepositoryInterface
{
    public function index()
    {
        return Firma::with('pracownicy')->get();
    }

    public function getById($id)
    {
        return Firma::with('pracownicy')->findOrFail($id);
    }

    public function store(array $data)
    {
        return Firma::create($data);
    }

    public function update(array $data, $id)
    {
        return Firma::whereId($id)->update($data);
    }

    public function delete($id)
    {
        Firma::destroy($id);
    }
}
