<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'user_message';
}
