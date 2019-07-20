<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Conformidades;

class Tomadores extends Model {

    use Notifiable;
    
    
    protected $fillable = [
        
        'razaosocial', 'cnpj', 'endereco', 'email', 'fone', 'contato'
        
    ];
    
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function conformidades() {

        return $this->hasMany(Conformidades::class);
    }

}
