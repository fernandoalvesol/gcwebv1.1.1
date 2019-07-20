<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Setores extends Model
{
    use Notifiable;
    
    
    protected $fillable = [
      
        'setor', 'email', 'contato', 'fone'
        
    ];
    
    
    
    protected $hidden = [
        
        
        'password', 'remember_token',
    ];
}
