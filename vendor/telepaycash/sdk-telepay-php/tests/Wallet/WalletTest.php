<?php

namespace tests\Wallet;

use Test\TestInit;
use PHPUnit\Framework\TestCase;
use TelePay\TelePayAssetInput;

class WalletTest extends TestCase
{

    public function testGetBalance()
    {
        $telepay = TestInit::client();

        $asset = new TelePayAssetInput("TON", "TON", "mainnet");
        $balance = $telepay->getBalance($asset);

        $this->assertNotNull($balance);
        $this->assertArrayHasKey('wallets', $balance);

        $wallets = $balance['wallets'];
        $this->assertIsArray($wallets);
        $this->assertEquals(1, count($wallets));

        $wallet = $wallets[0];
        $this->assertArrayHasKey('asset', $wallet);
        $this->assertNotNull($wallet['asset']);

        $this->assertArrayHasKey('blockchain', $wallet);
        $this->assertNotNull($wallet['blockchain']);

        $this->assertArrayHasKey('balance', $wallet);
        $this->assertNotNull($wallet['balance']);

        $this->assertArrayHasKey('network', $wallet);

        return $balance;
    }

    public function testGetAllBalances()
    {
        $telepay = TestInit::client();

        $balances = $telepay->getAllBalances();

        $this->assertNotNull($balances);
        $this->assertArrayHasKey('wallets', $balances);

        $wallets = $balances['wallets'];
        $this->assertIsArray($wallets);
        $this->assertGreaterThanOrEqual(1, count($wallets));
        foreach ($wallets as $wallet) {
            $this->assertArrayHasKey('asset', $wallet);
            $this->assertNotNull($wallet['asset']);

            $this->assertArrayHasKey('blockchain', $wallet);
            $this->assertNotNull($wallet['blockchain']);

            $this->assertArrayHasKey('balance', $wallet);
            $this->assertNotNull($wallet['balance']);

            $this->assertArrayHasKey('network', $wallet);
        }
    }
}
