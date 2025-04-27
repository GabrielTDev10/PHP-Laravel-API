<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';  // Tabela 'produtos'

    protected $primaryKey = 'codigo';  // Defina a chave primária como 'codigo'

    public $incrementing = true;  // Informa que a chave primária é auto-incrementável

    protected $keyType = 'int';  // Define o tipo da chave primária como inteiro

    protected $fillable = [
        'descricao',
        'valor',
        'url_imagem',
    ];
}
