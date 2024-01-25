<?php

namespace App\Models;

use App\Observers\ExamObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'exams';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::observe(ExamObserver::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
