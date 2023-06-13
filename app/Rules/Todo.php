<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Todo implements ValidationRule
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if($value == 'done')
        {
            if($this->tree($this->id))
            {
                $fail('В подзаданиях этого задания есть статус todo!');
            }
        }
    }

    protected function tree($id)
    {
        $todo = \App\Models\Todo::find($id);
        foreach ($todo->parent as $item)
        {
            if($item->status != 'done')
            {
                return true;
            }
            $this->tree($item->id);
        }
    }
}
