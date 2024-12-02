<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pracownik extends Model
{
    /** @use HasFactory<\Database\Factories\PracownikFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['imie', 'nazwisko', 'email', 'telefon', 'firma_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pracownicy';

    public $timestamps = false;

    public function firma(): BelongsTo
    {
        return $this->belongsTo(Firma::class);
    }

}
