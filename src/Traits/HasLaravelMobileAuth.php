<?php

namespace UserAuth\laravelMobileAuth\Traits;

trait HasLaravelMobileAuth
{
    public function initializeHasLaravelMobileAuth()
    {
        $this->fillable[] = 'phone';
        $this->fillable[] = 'attempts_left';
        $this->fillable[] = 'most_login_with_otp';
     }
}
