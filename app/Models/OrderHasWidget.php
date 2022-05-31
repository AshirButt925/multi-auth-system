<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHasWidget extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function widget(){
        return $this->belongsTo(Widget::class, 'widget_id', 'id');
    }
}
