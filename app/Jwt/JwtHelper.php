<?php

namespace App\Jwt;

use App\Exceptions\TokenException;
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

    public function createToken(string $sub, string $fullname, string $key, int $exp): string
    {
        // create base64 header and payload
        $encodedHeader = base64_encode($this->createHeader($this->header));
        $encodedPayload = base64_encode(
            $this->createPayload([
                'sub' => $sub,
                'name' => $fullname,
                'iat' => time(),
                'exp' => $exp
            ])
        );

        // create signature
        $encodedSignature = base64_encode(
            $this->createSignature($encodedHeader, $encodedPayload, $key)
        );

        return $encodedHeader . '.' . $encodedPayload . '.' . $encodedSignature;
    }

    public function validateToken(string $token, string $key) : void
    {
        list($header, $payload, $signature) = explode('.', $token);

        $decodedHeader = base64_decode($header);
        $decodedPayload = base64_decode($payload);

        $hashedHeaderPayload = hash_hmac('sha256', $header.'.'.$payload, $key, true);
        $computedSignature = base64_encode($hashedHeaderPayload);

        if ($computedSignature !== $signature) {
            throw new TokenException("Invalid Token");
        }

        $payloadData = json_decode($decodedPayload);
        if (isset($payloadData->exp) && $payloadData->exp < time()) {
            throw new TokenException("Token Expired");
            
        }
    }
}
