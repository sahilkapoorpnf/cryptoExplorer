<?php

if (!function_exists('wrong_address')) {
    function wrong_address($address)
    {
        return preg_match('/^[13][a-zA-Z0-9]{27,34}/', $address) === 0;
    }
}