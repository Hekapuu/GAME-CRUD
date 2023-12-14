<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
    'min' => [
        'numeric' => 'El campo :attribute debe tener al menos :min caracteres.',
        // Otros ejemplos...
    ],
    'unique' => 'El campo :attribute ya fue tomado',
    // Mensajes para campos específicos
    'attributes' => [
        'nombre' => 'nombre',
        'apellido' => 'apellido',
        // Otros campos...
    ],
    'custom' => [
        'codigo_estudiante' => [
            'unique' => 'El codigo del estudiante ya esta registrado'
        ],
        'correo' => [
            'unique' => 'El correo ya esta registrado',
            'in' => 'Correo no registrado'
        ],
        'aula_code' => [
            'in' => 'No existe un aula con ese codigo'
        ],
        'password' => [
            'required' => 'La contraseña es obligatoria.'
        ]
    ]
];
