<?php
use Carbon\Carbon;

if(function_exists('date_now_carbon_timestamp') === false) {
    function date_now_carbon_timestamp()
    {
        return Carbon::now()->format('Y-m-d h:i:s');
    }
} 

if(function_exists('func_remove_mask_number') === false) {
    function func_remove_mask_number($number)
    {
        $number = preg_replace('/[^0-9]/', '', $number);

        return $number;
    }
}

if(function_exists('func_format_mask_cpf') === false) {
    function func_format_mask_cpf($cpf)
    {
        if(strlen($cpf) == 11) {
            $first = substr($cpf, 0,3);
            $second = substr($cpf, 3,3);
            $third = substr($cpf, 6,3);
            $fourth = substr($cpf, -2);

            $cpf = $first . '.' . $second . '.' . $third . '-' . $fourth;

            return $cpf;
        }
    }
}

if(function_exists('func_format_ddd_contact') === false) {
    function func_format_ddd_contact($number)
    {
        $number = func_remove_mask_number($number);

        $ddd = substr($number,0,2);

        return $ddd;
    }
}

if(function_exists('func_format_number_contact') === false) {
    function func_format_number_contact($number)
    {
        $number = func_remove_mask_number($number);

        $num = substr($number,-9);

        return $num;
    }
}

if(function_exists('format_carbon_date') === false) {
    function format_carbon_date($date, $mask = null)
    {
        $mask = $mask ? $mask : 'd-m-Y';
        return Carbon::create($date)->format($mask);
    }
}