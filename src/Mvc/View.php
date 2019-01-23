<?php

/**
 * Parent class for custom view classes.
 *
 * This class was implemented like part of Observer pattern
 * https://en.wikipedia.org/wiki/Observer_pattern
 * http://php.net/manual/en/class.splobserver.php
 */

namespace Travianz\Mvc;

abstract class View implements \SplObserver
{
    /**
     * @var array The view datas
     */
    protected $data;

    /**
     * @var Model The view model
     */
    protected $model;

    /**
     * @var string The View name
     */
    protected $name;
    
    /**
     * Render a view
     * 
     * @param float $executionTime The script execution time
     */
    abstract function render(float $executionTime);

    public function __construct(Model $model, string $name)
    {
        $this->model = $model;
        $this->name = $name;
        $this->data = [];
        $this->output = '';
    }

    /**
     * Update the observer datas
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        if ($subject instanceof Model) {
            $this->data = array_merge($this->data, $subject->get());
        }
    }
}
