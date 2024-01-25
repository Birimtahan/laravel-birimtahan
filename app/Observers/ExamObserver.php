<?php

namespace App\Observers;

use App\Models\Exam;
use App\Models\Section;

class ExamObserver
{
    /**
     * Handle the Section "created" event.
     */
    public function created(Exam $exam): void
    {
        $exam->sections()->create([
            'type' => Section::TYPE_PART
        ]);
    }
}
