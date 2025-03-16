<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class KafkaProducer
{
    public function produce(Message $message, $topic = NULL): bool
    {
        try {
            

            $producer = Kafka::publish()->onTopic('JOGADOR_CRIADO')->withMessage($message);

            $producer->send();

            return true; // Envio bem-sucedido
        } catch (Exception $e) {
            // Log do erro
            Log::error('Erro ao enviar mensagem para o Kafka: ' . $e->getMessage());
            return $e->getMessage(); // Envio falhou
        }
    }
}