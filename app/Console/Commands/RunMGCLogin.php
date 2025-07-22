<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;

class RunMGCLogin extends Command
{
    protected $signature = 'mgc:login';
    protected $description = 'Run CURL login to MGC endpoint';

    public function handle()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://arnelcellona.mgc01.ma-gestion-cloud.fr/api/index.php/login?login=arnelcellona9597%40gmail.com&password=Asd!23123&reset=1',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]); 

        $response = curl_exec($curl);
        curl_close($curl);

        $this->info($response);

        Log::error( print_r($response, true) );

        return 0;
    }
}
