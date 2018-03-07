<?php

namespace Bantenprov\AngkaMelekHuruf\Models\Bantenprov\AngkaMelekHuruf;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AngkaMelekHuruf extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'angka_melek_hurufs';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
