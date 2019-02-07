<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'nullable|unique:users|max:50',
            'email'=>'nullable|unique:users|email',
            'profile_image'=>'nullable'
        ];
    }
    public function messages(){
        return[
            'name.unique'=>'Este nome de utilizador já se encontra registado.', //verificado
            'name.max'=>'O nome de utilizador pode ter um máximo de 50 caracteres.', //verificado
            'email.unique'=>'Este email já se encontra registado.', //verificado
            'email.email'=>'O email que inseriu não tem o formato correto.', //verificado

        ];
    }
    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json(
                ['status' =>422,
                    'data'=>$validator->errors(),
                    'msg'=>'Erro de validação'
                ], 422
            )
        );
    }
}
