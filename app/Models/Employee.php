<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * Defino o que vai ser permitido
     * 
     * 
     * */
    protected $fillable = ['nome','cpf','data_contratacao'];

    /**
     * Defino o que não será permitido
     *
     * @var array
     */
    // protected $guarded = ['created_at','updated_at','id'];

    /**
     * Permito tudo
     */
    // protected $guarded = []

    /**
     * Define relação com endereço
     *
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,'employee_project','employee_id','project_id');
    }
}
