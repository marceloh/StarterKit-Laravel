<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasFactory, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'qtd_acessos',
    ];
}
