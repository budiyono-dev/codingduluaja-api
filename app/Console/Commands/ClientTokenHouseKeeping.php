<?php

namespace App\Console\Commands;

use App\Models\ClientToken;
use Illuminate\Console\Command;

class ClientTokenHouseKeeping extends Command
{
    protected $signature = 'app:token-hk';

    protected $description = 'Clear expired and non-active tokens from database';

    public function handle()
    {
        info('[token.SCHEDULE] house keeping start, clear expired tokens and inactive tokens');
        ClientToken::where('is_active', false)->delete();
        ClientToken::where('exp', '<', time())->delete();
        info('[token.SCHEDULE] house keeping finish, clear expired tokens and inactive tokens');
    }
}
