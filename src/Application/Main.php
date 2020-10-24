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
    /**
     * Main constructor.
     */
    public function __construct()
    {
        $orderusFactory = new OrderusFactory();
        $beastFactory = new BeastFactory();

        $this->orderus = $orderusFactory->create();
        $this->beast = $beastFactory->create();
    }

    /**
     *
     */
    public function play()
    {
        $this->initFirstDefenderAndAttacker($this->orderus, $this->beast);
        while ($this->round++ < self::MAX_ROUNDS && !$this->checkHealth($this->orderus, $this->beast)) {
            if ($this->orderus->isAttacker()) {
                $this->roundBattle($this->orderus, $this->beast);
                continue;
            }
            $this->roundBattle($this->beast, $this->orderus);
        }

    }

    /**
     * Perform attack, switch roles
     * @param AbstractFighter $attacker
     * @param AbstractFighter $defender
     */
    private function roundBattle(AbstractFighter $attacker, AbstractFighter $defender): void
    {
        $damage = $attacker->attack($defender);
        $defender->setHealth($defender->getHealth() - $damage);
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
    private function checkHealth(AbstractFighter $fighter, AbstractFighter $secondFighter): bool
    {
        # TODO we have a winner
        return $fighter->getHealth() <= 0 || $secondFighter->getHealth() <= 0;
    }
}
