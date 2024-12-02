<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Firma extends Model
{
    /** @use HasFactory<\Database\Factories\FirmaFactory> */
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nazwa', 'nip', 'adres', 'miasto', 'kod_pocztowy'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'firmy';

    public $timestamps = false;

    public function pracownicy(): HasMany
    {
        return $this->hasMany(Pracownik::class);
    }


}
