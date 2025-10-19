<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateRule implements ValidationRule
{
    protected $publishedAt;
    protected $startDate;
    protected $endDate;

    /**
     * Create a new rule instance.
     */
    public function __construct($publishedAt = null, $startDate = null, $endDate = null)
    {
        $this->publishedAt = $publishedAt;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get the current field value
        $currentValue = $value;

        // Determine which field is being validated and adjust accordingly
        switch ($attribute) {
            case 'published_at':
                $this->publishedAt = $currentValue;
                break;
            case 'start_date':
                $this->startDate = $currentValue;
                break;
            case 'end_date':
                $this->endDate = $currentValue;
                break;
        }

        // Validate the date order
        if ($this->publishedAt && $this->startDate && $this->endDate) {
            if ($this->publishedAt > $this->startDate) {
                $fail('The published date must be before the start date.');
            }
            if ($this->startDate > $this->endDate) {
                $fail('The start date must be before the end date.');
            }
        } elseif ($this->publishedAt && $this->startDate) {
            if ($this->publishedAt > $this->startDate) {
                $fail('The published date must be before the start date.');
            }
        } elseif ($this->startDate && $this->endDate) {
            if ($this->startDate > $this->endDate) {
                $fail('The start date must be before the end date.');
            }
        }
    }
}

