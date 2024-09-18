<?php

namespace App\Domain\TBot;

use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    protected string $name = 'help';

    protected string $description = 'Help command';

    public function handle()
    {
        $this->replyWithMessage(['text' => 'need help']);
    }
}
