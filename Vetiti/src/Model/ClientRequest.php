<?php

declare(strict_types=1);

namespace Vetiti\CommissionTask\Model;

use Vetiti\CommissionTask\Service\Math;

class ClientRequest
{
    private $date;

    private $clientId;

    private $clientType;

    private $requestType;

    private $amount;

    private $currency;

    public function __construct(array $request)
    {
        $calculations = new Math(2);
        $this->setDate($request[0]);
        $this->setClientId((int) $request[1]);
        $this->setClientType($request[2]);
        $this->setRequestType($request[3]);
        $this->setAmount($calculations->convertToEuro($request[4], $request[5]));
        $this->setCurrency($request[5]);
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function getClientType(): string
    {
        return $this->clientType;
    }

    public function setClientType(string $clientType): void
    {
        $this->clientType = $clientType;
    }

    public function getRequestType(): string
    {
        return $this->requestType;
    }

    public function setRequestType(string $requestType): void
    {
        $this->requestType = $requestType;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }
}
