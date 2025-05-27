<?php

namespace Digitlimit\Flag\Component;

use Illuminate\View\Component;
use Illuminate\View\View;

class Flag extends Component
{
    public string $code;

    public string $size = '1x1';

    public function __construct($code)
    {
        $this->code = strtolower($code);
    }

    public function render(): View
    {
        return view("flag::$this->size.$this->code");
    }
}