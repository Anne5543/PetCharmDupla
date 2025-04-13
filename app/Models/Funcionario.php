<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios'; 
    protected $fillable = ['nome', 'email', 'idade', 'nivel_escolar', 'telefone']; 
}
