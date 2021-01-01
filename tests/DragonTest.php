<?php

namespace RenokiCo\LeagueSdk\Test;

use RenokiCo\LeagueSdk\Dragon;
use RenokiCo\LeagueSdk\Instances\Champion;
use RenokiCo\LeagueSdk\Instances\ChampionSkin;
use RenokiCo\LeagueSdk\Instances\ChampionSpell;
use RenokiCo\LeagueSdk\Instances\Item;
use RenokiCo\LeagueSdk\Instances\ProfileIcon;
use RenokiCo\LeagueSdk\Instances\SummonerSpell;

class DragonTest extends TestCase
{
    public function test_champions()
    {
        foreach (Dragon::champions() as $champion) {
            $this->assertInstanceOf(Champion::class, $champion);
        }
    }

    public function test_champion()
    {
        $champion = Dragon::champion('Aatrox');

        $this->assertInstanceOf(Champion::class, $champion);
        $this->assertEquals('Aatrox', $champion->getName());
        $this->assertTrue(is_array($champion->toArray()));

        $this->assertInstanceOf(ChampionSpell::class, $champion->getPassive());
        $this->assertTrue(is_array($champion->getPassive()->toArray()));

        foreach ($champion->getSkins() as $skin) {
            $this->assertInstanceOf(ChampionSkin::class, $skin);
            $this->assertTrue(is_array($skin->toArray()));
        }

        foreach ($champion->getSpells() as $spell) {
            $this->assertInstanceOf(ChampionSpell::class, $spell);
            $this->assertTrue(is_array($spell->toArray()));
        }
    }

    public function test_items()
    {
        foreach (Dragon::items() as $item) {
            $this->assertInstanceOf(Item::class, $item);
            $this->assertTrue(is_array($item->toArray()));
        }
    }

    public function test_summoner_spells()
    {
        foreach (Dragon::summonerSpells() as $spell) {
            $this->assertInstanceOf(SummonerSpell::class, $spell);
            $this->assertTrue(is_array($spell->toArray()));
        }
    }

    public function test_profile_icons()
    {
        foreach (Dragon::profileIcons() as $icon) {
            $this->assertInstanceOf(ProfileIcon::class, $icon);
            $this->assertTrue(is_array($icon->toArray()));
        }
    }
}
