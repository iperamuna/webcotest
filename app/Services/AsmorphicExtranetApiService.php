<?php

declare(strict_types=1);

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

final class AsmorphicExtranetApiService
{
    private string $apiBaseUrl = 'https://extranet.asmorphic.com/api';

    private string $authEmail;

    private string $authPassword;

    private int $companyId;

    private string $authToken;

    // env('ASMORPHIC_EXTRANET_API_EMAIL')
    // env('ASMORPHIC_EXTRANET_API_PASSWORD')
    public function __construct()
    {

        $this->authEmail = config('app.asmorphic_extranet_api_email');
        $this->authPassword = config('app.asmorphic_extranet_api_password');
        $this->companyId = (int) config('app.asmorphic_extranet_api_company_id');

        $this->authenticate();

    }

    /**
     * Find Address
     */
    public function findAddress(string $street_number, string $unit_number, string $street_name, string $street_type, string $suburb, string $postcode, string $state)
    {
        $response = Http::withToken($this->authToken)
            ->post("$this->apiBaseUrl/orders/findaddress", [
                'company_id' => $this->companyId,
                'street_number' => $street_number,
                'unit_number' => $unit_number,
                'street_name' => $street_name,
                'street_type' => $street_type,
                'suburb' => $suburb,
                'postcode' => $postcode,
                'state' => $state,
            ]);

        return $response->json();
    }

    /**
     * Service Qualification
     */
    public function qualifyService(string $qualification_identifier, int $service_type_id = 3)
    {
        $response = Http::withToken($this->authToken)
            ->post("$this->apiBaseUrl/orders/qualify", [
                'company_id' => $this->companyId,
                'qualification_identifier' => $qualification_identifier,
                'service_type_id' => $service_type_id,
            ]);

        return $response->json();
    }

    private function authenticate()
    {

        $response = Http::post("$this->apiBaseUrl/login", [
            'email' => $this->authEmail,
            'password' => $this->authPassword,
        ]);

        if ($response->successful()) {
            $res = $response->json();
            $this->authToken = $res['result']['token'];
        } else {
            throw new Exception('Authentication Failed: '.$response->json()->message->error);
        }

    }
}
