<?php declare(strict_types=1);

namespace App\Console\Commands\Consumers;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Contracts\MessageConsumer;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\ConsumerMessage;

class KafkaJogadorCriadoConsumer extends Command
{
    protected $signature = "consume:JOGADOR_CRIADO";

    protected $description = "Consume Kafka messages from 'JOGADOR_CRIADO'.";

    public function handle()
    {
        $consumer = Kafka::consumer(['JOGADOR_CRIADO'])
            ->withHandler(function(ConsumerMessage $message, MessageConsumer $consumer) {
                $jogador = json_decode($message->getBody());
                Log::info("Jogado '{$jogador->nome}', de email '{$jogador->email}' cadastrado com sucesso");
            })
            ->build();
            
            $consumer->consume();
    }
}
