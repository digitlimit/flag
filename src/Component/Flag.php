<?php

namespace Digitlimit\Flag\Component;

use Illuminate\View\Component;
use Illuminate\View\View;

class Flag extends Component
{
    public string $code;

    public string $size;

    public function __construct($code, $size = '1x1')
    {
        $this->code = strtolower($code);
        $this->size = strtolower($size);
    }

    public function render(): View
    {
        return view("flag::components.$this->size.$this->code");
    }
}
