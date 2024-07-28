<?php

namespace App\Services\Application;

use App\Constants\ExpUnit;
use App\Dto\JwtParam;
use App\Exceptions\WebException;
use App\Helper\JwtHelper;
use App\Models\ClientApp;
use App\Models\ClientToken;
use App\Models\ExpiredToken;
use App\Repository\ResourceRepository;
use App\Repository\TokenRepository;

class AppManagerServiceImpl implements AppManagerService
{
    public function __construct(
        protected ResourceRepository $resourceRepository,
        protected TokenRepository $tokenRepository
    ) {}

    public function createToken(int $userId, int $resourceId, int $appClientId, int $expId)
    {
        $client = ClientApp::find($appClientId);
        $identifier = JwtHelper::generateIdentifier($userId, $resourceId, $appClientId);
        $connectedApp = $this->resourceRepository->findConnectedApp($resourceId, $appClientId, $userId);
        if (is_null($connectedApp)) {
            abort(404);
        }

        $activeToken = $this->tokenRepository->countByIdentifier($userId, $identifier);
        if ($activeToken > 0) {
            throw WebException::haveActiveToken('app.manager');
        }

        $exp = ExpiredToken::find($expId);
        $expUnixTime = JwtHelper::expToUnixTime($exp->exp_value, ExpUnit::tryFrom($exp->unit));
        $param = new JwtParam($userId, $appClientId, $resourceId, $expUnixTime);
        $tokenKey = JwtHelper::createKey($param);
        $token = JwtHelper::createToken($client->app_key, $param);

        ClientToken::create([
            'key' => $tokenKey,
            'value' => $token,
            'exp' => $expUnixTime,
            'is_active' => true,
            'identifier' => $identifier,
        ]);

        return $tokenKey;
    }

    public function showToken(int $userId, int $resourceId, int $appClientId)
    {
        $identifier = JwtHelper::generateIdentifier($userId, $resourceId, $appClientId);
        $cToken = $this->tokenRepository->findByIdentifier($userId, $identifier);

        if (is_null($cToken)) {
            throw WebException::tokenNotFound('app.manager');
        }

        return $cToken->key;
    }

    public function revokeToken(int $userId, int $resourceId, int $appClientId)
    {
        $identifier = JwtHelper::generateIdentifier($userId, $resourceId, $appClientId);
        $cToken = $this->tokenRepository->findByIdentifier($userId, $identifier);

        if (is_null($cToken)) {
            throw WebException::tokenNotFound('app.manager');
        }
        $cToken->is_active = false;
        $cToken->save();
    }
}
