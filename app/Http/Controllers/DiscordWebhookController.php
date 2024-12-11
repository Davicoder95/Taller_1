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
            'username' => 'Sistema de RegistrO DaviCoder',
            'embeds' => [[
                'title' => 'Notificación de Usuario',
                'description' => $message,
                'color' => 3066993,
                'footer' => [
                    'text' => 'Sistema de Registro',
                ],
                'timestamp' => now()->toIso8601String(),
            ]]
        ];

        Http::post($webhookUrl, $data);
        if ($response->successful()) {
            return response()->json(['message' => 'Mensaje enviado correctamente a Discord'], 200);
        } else {
            return response()->json(['error' => 'Error al enviar el mensaje a Discord'], 500);
        }
    }

    public function sendNewUserMessage($name, $lastname, $email)
    {
        $message = "**Nuevo Usuario Creado**\n";
        $message .= "Nombre: **{$name} {$lastname}**\n";
        $message .= "Correo: **{$email}**\n\n";
        $message .= "*Este mensaje fue enviado por DaviCoder.*";
        $this->sendMessageDiscord($message);
        \Log::info("Intentando enviar mensaje a Discord: " . $message);

    }
}
