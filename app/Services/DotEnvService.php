<?php

namespace App\Services;

class DotEnvService
{
    private $env;

    public function __construct($env = '.env')
    {
        $this->env = base_path() . '/' . $env;
    }

    public function createFrom($env) {
        $env = base_path() . '/' . $env;
        if (file_exists($env) && is_writable(base_path()))
            return copy($env, $this->env);

        return FALSE;
    }

    /**
     * Get config variables from env file
     * @return array
     */
    public function get() {
        if (file_exists($this->env) && preg_match_all('#^(.*)=(.*)#m', file_get_contents($this->env), $matches))
            return array_combine($matches[1], $matches[2]);

        return FALSE;
    }

    /**
     * Save config variables to env file
     * @param array $params
     * @return bool
     */
    public function save(array $params) {
        if (!empty($params) && is_array($params) && is_writable($this->env)) {
            return file_put_contents($this->env, implode("\n", array_map(function ($key, $value) {
                return $key . '=' . $value;
            }, array_keys($params), $params)));
        }

        return FALSE;
    }
}