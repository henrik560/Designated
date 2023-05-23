<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Statamic\Facades\Form;

class ConsultationRequestController extends Controller
{
    public function store(ConsultationRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            $formData = [
                'naam' => $request->input('name'),
                'e-mailadres' => $request->input('email'),
                'telefoonnummer' => $request->input('phoneNumber'),
            ];

            $submission = Form::find('consultation_request')->makeSubmission();
            $submission->data($formData);
            $submission->save();

            return response()->json(['message' => 'Aanvraag succesvol verzonden']);
        } catch (Exception $e) {
            return response()->json(["message" => "Er is iets fout gegaan: " . $e->getMessage()], 422);
        }
    }
}
