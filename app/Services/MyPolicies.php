<?php

namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Policy;

class MyPolicy extends Policy
{
    public function configure()
    {
        self::configure();

        $this->addDirective(Directive::SCRIPT, 'www.google.com');
        
    }
}