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

    'accepted'             => 'Не подтверждено поле :attribute',
    'active_url'           => ':attribute не является валидным URL.',
    'after'                => ':attribute должно быть датой позже :date.',
    'after_or_equal'       => ':attribute должно быть датой не раньше :date.',
    'alpha'                => ':attribute может содержать только буквы.',
    'alpha_dash'           => ':attribute может содержать только буквы, цифры и тире.',
    'alpha_num'            => ':attribute может содержать только буквы и цифры.',
    'array'                => ':attribute должно быть массивом.',
    'before'               => ':attribute должно быть датой раньше :date.',
    'before_or_equal'      => ':attribute должно быть датой не позже :date.',
    'between'              => [
        'numeric' => ':attribute должно быть между :min и :max.',
        'file'    => 'Размер файла :attribute должен быть между :min и :max КБ.',
        'string'  => ':attribute должен быть :min and :max characters.',
        'array'   => ':attribute должен содержать от :min до :max элементов.',
    ],
    'boolean'              => ':attribute должно быть равно true или false.',
    'confirmed'            => ':attribute не совпадает с подтверждением.',
    'date'                 => ':attribute не является датой.',
    'date_format'          => ':attribute не соответствует формату даты :format.',
    'different'            => ':attribute должен отличаться от :other.',
    'digits'               => ':attribute должно содержать :digits цифр.',
    'digits_between'       => ':attribute должно содержать от :min до :max цифр.',
    'dimensions'           => ':attribute не соответствует формату размера.',
    'distinct'             => ':attribute не должен дублироваться.',
    'email'                => ':attribute должно быть существующим адресом электронной почты.',
    'exists'               => 'Указано несуществующее значение в поле :attribute.',
    'file'                 => ':attribute должно являться файлом.',
    'filled'               => ':attribute должно быть заполнено.',
    'image'                => ':attribute должно быть изображением.',
    'in'                   => 'Неверный :attribute.',
    'in_array'             => ':attribute не совпадает ни с одним из :other.',
    'integer'              => ':attribute должно быть целым числом.',
    'ip'                   => ':attribute должно быть валидным IP адресом.',
    'ipv4'                 => ':attribute должно быть валидным IPv4 адресом.',
    'ipv6'                 => ':attribute должно быть IPv6 адресом.',
    'json'                 => ':attribute должно быть валидной JSON строкой.',
    'max'                  => [
        'numeric' => ':attribute не может быть больше :max.',
        'file'    => 'Размер файла :attribute не может быть больше :max КБ.',
        'string'  => ':attribute не может содержать больше :max символ(ов).',
        'array'   => ':attribute не может содержать больше :max элементов.',
    ],
    'mimes'                => 'Расширение файла :attribute должно быть одним из: :values.',
    'mimetypes'            => 'Расширение файла :attribute должно быть одним из: :values.',
    'min'                  => [
        'numeric' => ':attribute должно быть равно минимум :min.',
        'file'    => 'Размер файла :attribute должен быть как минимум :min КБ.',
        'string'  => ':attribute должно состоять как минимум из :min символ(ов).',
        'array'   => ':attribute должно содержать как минимум :min элементов.',
    ],
    'not_in'               => 'Неверный :attribute.',
    'numeric'              => ':attribute должно быть числом.',
    'present'              => ':attribute должно пристутствовать в запросе.',
    'regex'                => 'Неверный формат поля :attribute.',
    'required'             => ':attribute обязательно для заполнения.',
    'required_if'          => ':attribute обязательно для заполнения при выбранном значении в поле :other.',
    'required_unless'      => ':attribute обязательно, если в значениях :other не указано :values.',
    'required_with'        => ':attribute обязательно, если есть хотя бы одно :values.',
    'required_with_all'    => ':attribute обязательно, если есть :values.',
    'required_without'     => ':attribute обязательно, если нет хотя бы одного :values.',
    'required_without_all' => ':attribute обязательно, если ни одно из :values не пристутствует.',
    'same'                 => ':attribute и :other должны быть одинаковыми.',
    'size'                 => [
        'numeric' => ':attribute должно быть равно :size.',
        'file'    => 'Файл :attribute должен быть не более :size КБ.',
        'string'  => 'Поле :attribute должно содержать :size символов.',
        'array'   => 'Поле :attribute должно содержать :size элементов.',
    ],
    'string'               => 'Поле :attribute должно быть строкой.',
    'timezone'             => ':attribute должно быть валидным часовым поясом (TZ).',
    'unique'               => 'Такой :attribute уже используется.',
    'uploaded'             => ':attribute failed to upload.',
    'url'                  => ':attribute не является URL.',
];
