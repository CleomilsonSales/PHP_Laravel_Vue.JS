<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\RedefinirSenhaNotification;
use App\Notifications\VerificarEmailNotification;


/* para garantir que o email é da pessoa pelo processo de validação de email
    olha a route/web */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token){
        //dd('chegamos ate aqui!');
        $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));
    }

    public function sendEmailVerificationNotification(){
        //dd('chegamos ate aqui!');
        $this->notify(new VerificarEmailNotification($this->name));
    }

    public function tarefas(){
        //hasMany (tem muitos)
        //não preciso usar o nome real da tabela (tarefas) pq o laravel reconhece pelo padrão de nomeclaturas
        return $this->hasMany('App\Models\Tarefa');
    }
}
