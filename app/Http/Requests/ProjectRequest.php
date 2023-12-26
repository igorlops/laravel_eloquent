<?php

namespace App\Http\Requests;

use App\Rules\ValorMonetario;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome'=>['required','string','min:2','max:100'],
            'orcamento'=>['required','min:0', new ValorMonetario],
            'data_inicio'=>['required','date_format:d/m/Y'],
            'data_final'=>['required','date_format:d/m/Y'],
            'client_id'=> ['required','int'],
            'funcionarios'=>['required','array']
        ];
    }
    protected function getValidatorInstance()
    {
        $request = $this;
        return parent::getValidatorInstance()->after(function(Validator $v) use($request){
            if($v->errors()->isEmpty()){
                $dados = $request->all();
                $dados['data_inicio'] = data_to_iso($dados['data_inicio']);
                $dados['data_final'] = data_to_iso($dados['data_final']);
                $dados['orcamento'] = str_replace(['.',','],['','.'],$dados['orcamento']);
                $request->replace($dados);
            }
        });
    }
}
