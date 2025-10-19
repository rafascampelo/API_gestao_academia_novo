<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;
    // 🌟 1. Informa ao Laravel que a tabela de usuários é 'funcionario'
    protected $table = 'funcionario';

    // 🌟 2. Define a chave primária
    protected $primaryKey = 'cod_func';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nome_func',
        'email',
        'password', 
        'funcao', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
public function isAdmin(): bool
    {
        // Assumindo que a função 'Coordenador da Academia' ou similar é o ADM
        // Você pode ter que ajustar o texto exato da função:
        return $this->funcao === 'Coordenador da Academia' || $this->funcao === 'ADM'; 
    }

    /**
     * Verifica se o usuário tem a role de supervisor (ou superior, se aplicável).
     */
    public function isSupervisor(): bool
    {
        
        return $this->funcao === 'Supervisor' || $this->isAdmin();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
