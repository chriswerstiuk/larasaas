<?php

if (! function_exists('on_page')) {
    function on_page($path)
    {
        return request()->is($path);
    }
}

if (! function_exists('return_if')) {
    function return_if($condition, $value)
    {
        if ($condition) {
            return $value;
        }
    }
}

if (! function_exists('return_if_else')) {
    function return_if_else($condition, $value1, $value2)
    {
        if ($condition) {
            return $value1;
        }

        return $value2;
    }
}
