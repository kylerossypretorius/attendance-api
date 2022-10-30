<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceStoreRequest;
use App\Models\Attendance;
use Carbon\Carbon;
use Dingo\Api\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class AttendanceController extends ApiController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $date = $request->get('date');
            if (empty($date)) {
                $date = Carbon::now()->format('Y-m-d');
            }

            $attendances = Attendance::with(['subject', 'teacher', 'students'])
                ->where(['attendance_date' => $date])
                ->get();

            $attendanceResult = collect($attendances)->map(fn (object $item) => (object) [
                'subject'            => $item->subject->name,
                'teacher_name'       => $item->teacher->name,
                'attendance_date'    => $item->attendance_date,
                'students'           => $item->students,
            ])->toArray();

            return $this->respondWithSuccess($attendanceResult);

        } catch (\Exception | GuzzleException $e) {
            Log::error($e->getMessage());
            return $this->respondUnprocessableEntity($e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        try {
            $date = $request->get('date');
            if (empty($date)) {
                $date = Carbon::now()->format('Y-m-d');
            }

            $attendances = Attendance::with(['subject', 'teacher', 'students'])
                ->where(['attendance_date' => $date])
                ->firstOrFail();

            $attendanceResult = [
                'subject'            => $attendances->subject->name,
                'teacher_name'       => $attendances->teacher->name,
                'attendance_date'    => $attendances->attendance_date,
                'students'            => $attendances->students,
            ];

            return $this->respondWithSuccess($attendanceResult);

        } catch (\Exception | GuzzleException $e) {
            Log::error($e->getMessage());
            return $this->respondUnprocessableEntity($e->getMessage());
        }
    }

    /**
     * @param AttendanceStoreRequest $request
     * @return JsonResponse
     */
    public function store(AttendanceStoreRequest $request): JsonResponse
    {
        try {
            $now = Carbon::now()->format('Y-m-d H:i:s');
            $attendance = Attendance::create(
                [
                    'subject_id' => $request['subject_id'],
                    'user_id' => $request['user_id'],
                    'attendance_date' => $request['date'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            );

            return $this->respondWithSuccess([
                'message' => 'Attendance saved successfully'
            ]);

        } catch (\Exception | GuzzleException $e) {
            Log::error($e->getMessage());
            return $this->respondUnprocessableEntity($e->getMessage());
        }
    }
}
