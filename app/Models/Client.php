<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nome','endereco', 'observacao'];
    use HasFactory;

    /**
     * 
     * Define que um cliente pode ter muitos projetos
     *
     */
    public function projects()
    {
        return $this->hasMany(Project::class,'client_id','id');
    }
}
