<?php

namespace App\Jwt;

use Illuminate\Support\Str;

class JwtHelper
{

    public function __construct(
        public array $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ]
    ) {
    }

    private function createHeader(array $header): string
    {
        return json_encode($header);
    }

    private function createPayload(array $payload): string
    {
        return json_encode($payload);
    }

    private function createSignature($encodedHeader, $encodedPayload, $secret): string
    {
        return hash_hmac('sha256', $encodedHeader . '.' . $encodedPayload, $secret, true);
    }

    public function createToken(string $sub, string $fullname, string $key): string
    {
        // create base64 header and payload
        $encodedHeader = base64_encode($this->createHeader($this->header));
        $encodedPayload = base64_encode(
            $this->createPayload([
                'sub' => $sub,
                'name' => $fullname,
                'iat' => time(),
                'exp' => time() + 3600
            ])
        );

        // remove padding
        $encodedHeader = rtrim($encodedHeader, '=');
        $encodedPayload = rtrim($encodedPayload, '=');

        // create signature
        $encodedSignature = base64_encode(
            $this->createSignature($encodedHeader, $encodedPayload, $key)
        );

        // remove paffing
        $encodedSignature = rtrim($encodedSignature, '=');

        return $encodedHeader . '.' . $encodedPayload . '.' . $encodedSignature;
    }

    public function validateToken(string $token) : void
    {
        
    }
}
