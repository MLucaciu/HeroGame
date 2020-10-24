<?php

declare(strict_types=1);

namespace HeroGame\Application;

use HeroGame\Domain\AbstractFighter;
use HeroGame\Domain\Beast;
use HeroGame\Domain\Orderus;
use HeroGame\Factory\BeastFactory;
use HeroGame\Factory\OrderusFactory;

/**
 * Class Main
 * @package HeroGame\Application
 */
class Main
{
    public const MAX_ROUNDS = 20;

    private ?Orderus $orderus = null;
    private ?Beast $beast = null;
    private int $round = 0;
    private bool $gameOver = false;

    /**
     * Main constructor.
     * @param OrderusFactory $orderusFactory
     * @param BeastFactory $beastFactory
     */
    public function __construct(
        OrderusFactory $orderusFactory,
        BeastFactory $beastFactory
    ) {
        $this->orderus = $orderusFactory->create();
        $this->beast = $beastFactory->create();

        echo 'Stats for Orderus: ' . PHP_EOL;
        print_r($this->orderus->getStats());
        echo PHP_EOL;
        echo 'Stats for the Beast: ' . PHP_EOL;
        print_r($this->beast->getStats());
    }

    /**
     *
     */
    public function play()
    {
        $this->initFirstDefenderAndAttacker($this->orderus, $this->beast);
        while ($this->round++ < self::MAX_ROUNDS && !$this->checkHealth($this->orderus, $this->beast)) {
            echo PHP_EOL . 'round ' . $this->round . PHP_EOL;
            if ($this->orderus->isAttacker()) {
                $this->roundBattle($this->orderus, $this->beast);
                continue;
            }
            $this->roundBattle($this->beast, $this->orderus);
        }
        $this->declareWinner($this->orderus, $this->beast, $this->round);
    }

    /**
     * Perform attack, switch roles
     * @param AbstractFighter $attacker
     * @param AbstractFighter $defender
     */
    private function roundBattle(AbstractFighter $attacker, AbstractFighter $defender): void
    {
        $damage = $attacker->attack($defender);
        echo $defender->getName() . ' has ' . $defender->getHealth() . ' health ' . 'before the setHealth' . PHP_EOL;
        $defender->setHealth($defender->getHealth() - $damage);
        echo $defender->getName() . ' has ' . $defender->getHealth() . ' health ' . 'after the setHealth';
        $this->switchRoles($attacker, $defender);
    }

    /**
     * The first attack is done by the fighter with the higher speed. If both fighters have the same speed,
     *  than the attack is carried on by the fighter with the highest luck.
     *
     * @param AbstractFighter $orderus
     * @param AbstractFighter $beast
     * @return AbstractFighter
     */
    private function initFirstDefenderAndAttacker(AbstractFighter $orderus, AbstractFighter $beast): AbstractFighter
    {
        if ($orderus->getStats()[AbstractFighter::SPEED] > $beast->getStats()[AbstractFighter::SPEED]) {
            return $orderus->setIsAttacker(true);
        } else {
            if ($orderus->getStats()[AbstractFighter::SPEED] < $beast->getStats()[AbstractFighter::SPEED]) {
                return $beast->setIsAttacker(true);
            }
        }
        if ($orderus->getStats()[AbstractFighter::LUCK] > $beast->getStats()[AbstractFighter::LUCK]) {
            return $orderus->setIsAttacker(true);
        } else {
            if ($orderus->getStats()[AbstractFighter::LUCK] < $beast->getStats()[AbstractFighter::LUCK]) {
                return $beast->setIsAttacker(true);
            }
        }
        # if both the speed and luck are equal, make Orderus the attacker
        return $orderus->setIsAttacker(true);
    }

    /**
     * @param AbstractFighter $attacker
     * @param AbstractFighter $defender
     */
    private function switchRoles(AbstractFighter $attacker, AbstractFighter $defender): void
    {
        $attacker->setIsAttacker(false);
        $defender->setIsAttacker(true);
    }

    /**
     * Check if the health of any of the fighters is <= 0.
     * @param AbstractFighter $fighter
     * @param AbstractFighter $secondFighter
     * @return bool
     */
    protected function checkHealth(AbstractFighter $fighter, AbstractFighter $secondFighter): bool
    {
        # TODO we have a winner
        return $fighter->getHealth() <= 0 || $secondFighter->getHealth() <= 0;
    }

    /**
     * @param AbstractFighter $orderus
     * @param AbstractFighter $beast
     * @param int $round
     */
    protected function declareWinner(AbstractFighter $orderus, AbstractFighter $beast, int $round): Main
    {
        echo PHP_EOL;
        if ($orderus->getHealth() <= 0) {
            echo 'The Beast won in ' . $round . ' rounds.';
        } else {
            echo 'Orderus won in ' . $round . ' rounds';
        }
        echo PHP_EOL;
        $this->gameOver = true;
        return $this;
    }
}
