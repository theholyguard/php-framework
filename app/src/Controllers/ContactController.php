<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class ContactController extends AbstractController {


    public function process(Request $request): Response {

        $body = $request->getBody();

        // Validate required fields
        if (empty($body['email']) || empty($body['subject']) || empty($body['message'])) {
            return new Response(json_encode(['error' => 'Email, subject, and message are required.']), 400, ['Content-Type' => 'application/json']);
        }

        $email = $body['email'];
        $subject = $body['subject'];
        $message = $body['message'];

        $responseData = [
            'message' => 'Contact form submitted successfully!',
            'data' => [
                'email' => $email,
                'subject' => $subject,
                'message' => $message
            ]
        ];
        return new Response(json_encode($responseData), 200, ['Content-Type' => 'application/json']);
    }
}