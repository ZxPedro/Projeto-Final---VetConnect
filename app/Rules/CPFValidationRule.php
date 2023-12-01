<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CPFValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $value);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) !== 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais
        if (preg_match('/^(\d)\1*$/', $cpf)) {
            return false;
        }

        // Calcula os dígitos verificadores
        for ($i = 9; $i < 11; $i++) {
            $j = 0;
            $soma = 0;

            while ($j < $i) {
                $soma += $cpf[$j] * ($i + 1 - $j);
                $j++;
            }

            $resto = $soma % 11;
            $digito = $resto < 2 ? 0 : 11 - $resto;

            if ((int) $cpf[$i] !== $digito) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        return 'O CPF informado não é válido.';
    }
}
