<?php

namespace Vuthy\AuthenticationManager;

use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
  public function boot(){
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
  }

  public function register(){
    
  }
}