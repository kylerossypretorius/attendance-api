<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'attendance_date' => $request->attendance_date,
                'attributes' => [
                    'teacher_name' => $request->teacher_name,
                    'subject' => $request->subject,
                    'students' => $request->students,
                ]
            ]
        ];
    }

    private function resourceType(): string
    {
        return 'attendance';
    }
}
