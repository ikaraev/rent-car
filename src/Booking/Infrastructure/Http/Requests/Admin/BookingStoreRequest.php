<?php

namespace Karaev\Booking\Infrastructure\Http\Requests\Admin;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contactForm' => 'required',
            'contactForm.name' => 'required',
            'contactForm.email' => 'required|email',
            'contactForm.date_birthday' => 'required',
            'contactForm.phone' => 'required',
            'start' => 'required',
            'finish' => 'required',
        ];
    }

    public function getPreparedParams($keys = null): array
    {
        $all = parent::all();

        $all['start'] = (new DateTime($all['start']))->format('Y-m-d H:i');
        $all['finish'] = (new DateTime($all['finish']))->format('Y-m-d H:i');
        $all['contactForm']['date_birthday'] = (new DateTime($all['contactForm']['date_birthday']))->format('Y-m-d');

        return $all;
    }
}
