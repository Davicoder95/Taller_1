<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DiscordWebhookController extends Controller
{
    public function sendMessageDiscord(String $message)
    {
        $webhookUrl = env('DISCORD_WEBHOOK_URL');

        $data = [
            'content' => $message,
            'embeds' => [[
                'title' => 'Notificación de Nuevo User',
                'description' => $message,
                'color' => 3066993,
                'footer' => [
                    'text' => 'Nuevo usuario creado',
                ],
                'timestamp' => now()->toIso8601String(),
            ]]
        ];

        Http::post($webhookUrl, $data);
    }

    public function sendNewUserMessage($name, $lastname, $email)
    {
        $message = "**Nuevo Usuario Creado**\n";
        $message .= "Nombre: **{$name} {$lastname}**\n";
        $message .= "Correo: **{$email}**\n\n";
        $message .= "*Este mensaje fue enviado por DaviCoder.*";
        $this->sendMessageDiscord($message);

    }
}
