<?php

namespace App\Models;

use App\Events\PostCreatedEvent;
use App\Scopes\YearScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
//    protected $table = 'postagens';
//    protected $primaryKey = 'id_postagem';
//    protected $keyType = 'string';
//    public $incrementing = false;
//    public $timestamps = false;
//    const CREATED_AT = 'data_criacao';
//    const UPDATED_AT = 'data_atualizacao';
//    protected $dateFormat = 'd/m/Y';
//    protected $connection = 'pgsql';
//    protected $attributes = [
//        'active' => true
//    ];

    protected $fillable = ['title', 'body', 'date', 'user_id'];

    protected $dispatchesEvents = [
        'created' => PostCreatedEvent::class
    ];

//    protected static function booted(): void
//    {
//        static::addGlobalScope(new YearScope());
////        static::addGlobalScope('year', function (Builder $builder) {
////            $builder->whereYear('date', Carbon::now()->year);
////        });
//    }

//    public function scopeLastWeek($query)
//    {
//        return $this->whereDate('date', '>=', now()->subDays(8))
//            ->whereDate('date', '<=', now()->subDays(1));
//    }
//
//    public function scopeYesterday($query)
//    {
//        return $this->whereDate('date', '>=', now()->subDays(1));
//    }

//    public function setDateAttribute($value)
//    {
//        $this->attributes['date'] = Carbon::make($value)->format('d/m/y H:i');
//    }

//    protected $casts = [
//        'date' => 'datetime:d/m/Y H:i'
//    ];

//    public function getTitleAttribute($value): string
//    {
//        return strtoupper($value);
//    }

//    public function getDateAttribute($value)
//    {
//        return Carbon::make($value)->format('d/m/y H:i');
//    }

//    public function getTitleAndCreatedAtAttribute(): string
//    {
//        return $this->title . ' - ' . date_format($this->created_at, 'd/m/Y H:i');
//    }
}
