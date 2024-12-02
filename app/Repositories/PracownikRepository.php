<?php

namespace App\Repositories;

use App\Interfaces\PracownikRepositoryInterface;
use App\Models\Pracownik;

class PracownikRepository implements PracownikRepositoryInterface
{
    public function index()
    {
        return Pracownik::with('firma')->get();
    }

    public function getById($id)
    {
        return Pracownik::with('firma')->findOrFail($id);
    }

    public function store(array $data)
    {
        return Pracownik::create($data);
    }

    public function update(array $data, $id)
    {
        return Pracownik::whereId($id)->update($data);
    }

    public function delete($id)
    {
        Pracownik::destroy($id);
    }

}
