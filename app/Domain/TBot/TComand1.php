<?php

namespace App\Domain\TBot;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class TComand1 extends Command
{
    protected string $name = 'command1';

    protected string $description = 'Start Command to get you started';

    protected string $pattern = '{username} {age: \d+}';

    public function handle()
    {
        // username from Update object to be used as fallback.
        $fallbackUsername = $this->getUpdate()->getMessage()->from->username;

        // Get the username argument if the user provides,
        // (optional) fallback to username from Update object as the default.
        $username = $this->argument(
            'username',
            $fallbackUsername
        );

        $this->replyWithMessage([
            'text' => "Hello {$username}! Welcome to our bot, Here are our available commands:",
        ]);

        // This will update the chat status to "typing..."
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        // Get all the registered commands.
        $commands = $this->getTelegram()->getCommands();

        info('comand available list '.json_encode($commands));

        $response = '';
        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s'.PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage(['text' => $response]);
    }
}
