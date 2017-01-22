<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Os :attribute devem ser aceitos.',
    'active_url'           => 'O :attribute não é uma URL válida.',
    'after'                => 'O :attribute deve ser uma data depois de :date.',
    'alpha'                => 'O :attribute deve conter somente letras.',
    'alpha_dash'           => 'O :attribute deve conter somente letras, números e hashtag.',
    'alpha_num'            => 'O :attribute deve conter somente letras e números.',
    'array'                => 'O :attribute deve ser um array.',
    'before'               => 'O :attribute deve ser uma data antes de :date.',
    'between'              => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file'    => 'O :attribute deve ter entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve ter entre :min e :max caracteres.',
        'array'   => 'O :attribute deve ter entre :min e :max items.',
    ],
    'boolean'              => 'O :attribute deve ser Sim ou Não.',
    'confirmed'            => 'A confimação do :attribute não combina.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não combina com o formato :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute deve conter :digits dígitos.',
    'digits_between'       => 'O :attribute deve conter entre :min e :max dígitos.',
    'dimensions'           => 'O :attribute contém dimenções inválidas de imagem.',
    'distinct'             => 'O :attribute contém valor duplicado.',
    'email'                => 'O :attribute deve ser um E-Mail válido.',
    'exists'               => 'O campo selecionado :attribute é inválido.',
    'file'                 => 'O :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute é obrigatório.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O campo selecionado :attribute é inválido.',
    'in_array'             => 'O :attribute não existe em :other.',
    'integer'              => 'O :attribute deve ser um inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço de IP válido.',
    'json'                 => 'O :attribute deve ser uma string JSON válida.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'mensagem-privada',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'tags'         => 'tags',
    ],

];
