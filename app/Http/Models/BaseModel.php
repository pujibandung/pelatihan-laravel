<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model
{
    protected $keyType='string';
    protected $guarded =['_token','id'];
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->id = Uuid::uuid4()->toString();
            } catch (UnsatisfiedDependencyException $e) {

            }
        });
    }

}
