<?php

namespace App\Observers;

use App\Models\Section;

class SectionObserver
{
    /**
     * Handle the Section "created" event.
     */
    public function created(Section $section): void
    {
        $section->options()->create();
    }
}
