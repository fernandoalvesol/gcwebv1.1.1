<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Models\Tomadores;
use App\Models\ConformidadesViews;


class Conformidades extends Model
{
    use Notifiable;
    
    
    protected $fillable = [
      
        'user_id', 'tomador_id', 'tipo', 'setor', 'atribuir', 'relator', 'prioridade', 
        'data', 'hora', 'status', 'c_um', 'c_dois', 'c_tres', 'c_quatro', 'c_cinco', 'c_seis',
        'c_sete', 'c_oito', 'descricao'
    ];
    
    
    
    protected $hidden = [
        
        
        'password', 'remember_token',
    
        
        ];
    
    public function user(){
        
                
        return $this->belongsTo(User::class);
                
    }
    
    public function tomador(){
        
        return $this->belongsTo(Tomadores::class);
        
    }


    public function views(){
        
        return $this->hasMany(ConformidadesViews::class);
        
    }
}
