<?php

namespace App\Jwt;

use App\Exceptions\TokenException;
use Illuminate\Support\Facades\Log;
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
        Log::debug("token created {$encodedHeader}, {$encodedPayload}, {$key}");
        $encodedSignature = base64_encode(
            $this->createSignature($encodedHeader, $encodedPayload, $key)
        );

        return $encodedHeader . '.' . $encodedPayload . '.' . $encodedSignature;
    }

    public function validateToken(string $token, string $key) : void
    {
        Log::debug("validate token {$token}, {$key}");
        list($header, $payload, $signature) = explode('.', $token);

        $encodeSignature = base64_encode(
            $this->createSignature($header, $payload, $key)
        );

        Log::info("calulcate sign : {$encodeSignature} <=> {$signature}");

        if ($encodeSignature !== $signature) {
            // throw new TokenException("Invalid Token");
            throw TokenException::invalid();
        }

        base64_decode($header);
        $decodedPayload = base64_decode($payload);
        $payloadData = json_decode($decodedPayload);

        if (isset($payloadData->exp) && $payloadData->exp < time()) {
            // throw new TokenException("Token Expired");
            throw TokenException::expired();
        }
    }
}
