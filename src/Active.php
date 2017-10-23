<?php

namespace Dwit\LaravelModelActive;

trait Active
{
    /**
     * ActiveModel configuration.
     *
     * @var mixed[]
     */
    protected $activeModelConfig = [
        'column' => 'active',
    ];

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootActive()
    {
        static::addGlobalScope(new ActiveScope);
    }

    /**
     * Sets up and overrides ActiveModel config.
     *
     * @param array $options
     */
    public function initActiveModel(array $options = [])
    {
        $this->activeModelConfig = array_replace($this->activeModelConfig, $options);
    }

    /**
     * Returns the name of the active column.
     *
     * @return string
     */
    public function activeColumn()
    {
        return $this->getActiveModelConfigValue('column');
    }

    /**
     * Returns a config value by key, or null if it does not exist.
     *
     * @param string $key
     * @return null|mixed
     */
    protected function getActiveModelConfigValue($key)
    {
        return array_key_exists($key, $this->activeModelConfig) ? $this->activeModelConfig[ $key ] : null;
    }
}
