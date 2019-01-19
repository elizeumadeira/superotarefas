<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    protected $fillable = ['titulo', 'descricao', 'prioridade'];
    protected $hidden = array('created_at', 'updated_at');
}