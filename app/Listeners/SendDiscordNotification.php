<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserCreated;
use App\Events\UserLogin;
use App\Services\DiscordWebhookService;
use Illuminate\Support\Facades\Log;
use App\Models\User;
class SendDiscordNotification
{
    protected $discordWebhook;

    // Colores predefinidos para cada tipo de acción
    private const COLOR_CREATED = 0xde5e00;
    private const ERROR_COLOR = 0xff0000;

    public function __construct(DiscordWebhookService $discordWeebhookService)
    {
        $this->discordWebhook = $discordWeebhookService;
    }

    public function handleUserCreated(UserCreated $event): void
    {
        $this->sendNotification($event->user, 'creado', auth()->user(), self::COLOR_CREATED);
    }

    public function handleUserLogin(UserLogin $event): void
    {
        $this->sendNotification($event->user, 'ingreso', auth()->user(), self::COLOR_CREATED);
    }

    protected function sendNotification($user, $action, $actor, $color)
    {
        try {
            $embed = [
                'title' => "🎉 Proyecto DaviCoder - Usuario {$action} 🎉",
                'color' => $color,
                'fields' => [
                    [
                        'name' => '💼 Id de user',
                        'value' => "{$user->id}",
                        'inline' => false,
                    ],
                    [
                        'name' => '👤 Nombre',
                        'value' => "{$user->name}",
                        'inline' => false,
                    ],
                    [
                        'name' => '📧 Correo Electrónico',
                        'value' => $user->email,
                        'inline' => false,
                    ],
                    [
                        'name' => '🏠 Dirección',

                        'value' => $user->address ?? 'No proporcionado',
                        'inline' => false,
                    ],
                    [
                        'name' => '🛠️ Realizado por',

                        'value' => "{$actor->name} con el ID {$actor->id}",
                        'inline' => false,
                    ],
                ],
                'footer' => [
                    'text' => implode(" | ", [
                        '🕒 Notificación realizada el ' . now()->format('d/m/y H:i')
                    ]),
                ]
            ];

            $this->discordWebhook->sendEmbed($embed);

        } catch (\Exception $e) {
            Log::error("Error al enviar notificación de Discord: " . $e->getMessage());
        }
    }

}
