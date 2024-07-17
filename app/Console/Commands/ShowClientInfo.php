<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;

class ShowClientInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'app:show-client-info';
    


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       
            $client = Client::latest()->first();
    
            if ($client) {
                $this->info("Informations du client :");
                $this->table(['ID', 'Nom', 'Email', 'Créé le'], [[
                    $client->id,
                    $client->nom,
                    $client->email,
                    $client->created_at,
                ]]);
            } else {
                $this->error("Aucun client trouvé.");
            }
        }
    

}


