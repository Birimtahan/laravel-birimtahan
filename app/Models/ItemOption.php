<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'exam_items';

    protected $fillable = [
        'item_id',
        'title',
        'description',
        'file',
        'section',
        'relative_order',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(ExamItem::class, 'item_id', 'id');
    }
}
