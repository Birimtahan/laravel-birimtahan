<?php

namespace App\Models;

use App\Observers\SectionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    public const TYPE_HEADER = 'header';
    public const TYPE_PART = 'part';
    public const TYPE_SHORT_ANSWER = 'short_answer';
    public const TYPE_MULTIPLE_CHOICE = 'multiple_choice';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_CHECKBOX_GRID = 'checkbox_grid';

    protected $table = 'sections';

    protected $fillable = [
        'exam_id',
        'title',
        'description',
        'file',
        'type',
        'correct_options',
        'relative_order',
        'is_default',
    ];

    protected $casts = [
        'correct_options' => 'json'
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::observe(SectionObserver::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
