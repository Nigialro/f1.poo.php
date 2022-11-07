<?php
// [abstract] Personnage (variables):
// - nom (string)
// - dateDeCreation (\DateTime)
// - phyPower (int) (0-100)
// - magPower (int) (0-100)
// - armor (int) (0-100)
// - escape (int) (0-100) // chance to escape // rogue.escape = 95 // warrior.escape = 50 => mt_rand(0,  (escape - 100))
// - life (int) (0-100)
// - mana (int) (0-100)
// - classe (string) : guerrier, mage, voleur, archer, ....
// _______ inventory & stuff
// - weapon (Weapon)  : equipped item
// - shield (Shield) : equipped item
// - bag (Bag)

abstract class Personnage {
    protected int $phyPower; // (nul)0 >>> 100(efficace)
    protected int $magPower; // (nul)0 >>> 100(efficace)
    protected int $armor; // (nul)0 >>> 100(efficace)
    protected int $escape; // chance to escape : (nul)0 >>> 100(efficace)
    protected int $life; // (nul)0 >>> 100(full)
    protected int $mana; // (nul)0 >>> 100(full)
    protected string $nom = 'Player';
    protected DateTime $dateDeCreation;

    public function __construct(
        string $nom,
    )
    {
        $this->setPhyPower = 50;
        $this->setMagPower = 50;
        $this->setArmor = 50;
        $this->setEscape = 50;
        $this->setLife = 100;
        $this->setMana = 100;
        $this->nom = $nom;
        $this->dateDeCreation = new DateTime();
    }

    /**
     * @param int $phyPower
     */
    public function setPhyPower(int $phyPower): Guerrier
    {
        $this->phyPower = $phyPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhyPower(): int
    {
        return $this->phyPower;
    }

    /**
     * @param int $magPower
     */
    public function setMagPower(int $magPower): Guerrier
    {
        $this->magPower = $magPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagPower(): int
    {
        return $this->magPower;
    }

    /**
     * @param int $armor
     */
    public function setArmor(int $armor): Guerrier
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @param int $escape
     */
    public function setEscape(int $escape): Guerrier
    {
        $this->escape = $escape;

        return $this;
    }

    /**
     * @return int
     */
    public function getEscape(): int
    {
        return $this->escape;
    }

    /**
     * @param int $life
     */
    public function setLife(int $life): Guerrier
    {
        $this->life = $life;

        return $this;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * @param int $mana
     */
    public function setMana(int $mana): Guerrier
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param string $classe
     */
    public function setClasse(string $classe): Guerrier
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * @return string
     */
    public function getClasse(): string
    {
        return $this->classe;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): Personnage
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param DateTime $dateDeCreation
     */
    public function setDateDeCreation(DateTime $dateDeCreation): Personnage
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateDeCreation(): string
    {
        return $this->dateDeCreation;
    }
}

class Guerrier extends Personnage {
    protected string $classe;

    public function __construct(
        string $classe = 'Guerrier',
    )
    {
        parent::__construct('Player');
        $this->setPhyPower = 80;
        $this->setMagPower = 20;
        $this->setArmor = 80;
        $this->setEscape = 20;
        $this->setLife = 100;
        $this->setMana = 100;
        $this->classe = $classe;
    }
}

class Mage extends Personnage {
    protected string $classe;

    public function __construct(
        string $classe = 'Mage'
    )
    {
        parent::__construct('Player');
        $this->setPhyPower = 20;
        $this->setMagPower = 80;
        $this->setArmor = 40;
        $this->setEscape = 60;
        $this->setLife = 100;
        $this->setMana = 100;
        $this->classe = $classe;
    }
}

class Voleur extends Personnage {
    protected string $classe;

    public function __construct(
        string $classe = 'Voleur'
    )
    {
        parent::__construct('Player');
        $this->setPhyPower = 60;
        $this->setMagPower = 40;
        $this->setArmor = 30;
        $this->setEscape = 70;
        $this->setLife = 100;
        $this->setMana = 100;
        $this->classe = $classe;
    }
}

class Archer extends Personnage {
    protected string $classe;

    public function __construct(
        string $classe = 'Archer'
    )
    {
        parent::__construct('Player');
        $this->setPhyPower = 60;
        $this->setMagPower = 40;
        $this->setArmor = 50;
        $this->setEscape = 50;
        $this->setLife = 100;
        $this->setMana = 100;
        $this->classe = $classe;
    }
}

// Personnage (méthodes):
// - [public] useItem(Item $item) => if item.equipable === false
//
// - [public] equipItem (Item $item) => if item.equipable === true
// item is Shield : ($item === Shield && Personnage.weapon.isTwoHanded === false)
// item is weapon : ($item === Weapon) => si item.isTwoHanded === true => unequipItem($shield)
//
// - [public] unequipItem (Item $item) : deséquiper un item
//
// - [public] attackTarget(Personnage $target) : attaquer un personnage => code pour calculer les dégats et l'utilisation de mana
// $damage = [calcul des dmg];
// $target->receiveDamage($damage);
//
// - [public] receiveDamage(int $damage) : recevoir des dégats => code pour calculer les dégats
//
// - [private] isDodged() : calculer si le personnage a esquivé l'attaque mt_rand(0,  (escape - 100)) === (escape - 100)
//
// - [public] isAlive() : vérifier si le personnage est en vie

// Mage extends Personnage
// Warrior extends Personnage
// Rogue extends Personnage

// [abstract] Foe extends Personnage => nom random, stats random
// Foe : bat|zombie|orc|gobelin|squelette
// each Foe override attackTarget(Personnage $target) => code pour calculer les dégats et l'utilisation de mana

// [abstract] item :
// - name (string)
// - description (string)
// - equipable (bool)
// - type (string) : weapon|shield|armor|potion|food|key|quest|misc

// weapon extend item :
// - damage (int)
// - isTwoHanded (bool)
// - weaponClass (string) : sword|axe|dagger|bow|staff|wand|spear|hammer|fist

// shield extend item :
// - armor (int)

// potion extend item :
// - const TYPE_HEAL = 'heal', TYPE_MANA = 'mana'
// - amount (float)
// - type (string)(self::TYPE_HEAL|self::TYPE_MANA)
// - used (bool) (false)

// Item > Weapon > Sword > LongSword
// Item > Weapon > Sword > GreatSword
// Item > Weapon > Staff > FireStaff
// Item > Shield > SmallShield
// Item > utility > Potion > HealthPotion
// Item > utility > Potion > ManaPotion

// Personnage->useItem(Item $item)
// Personnage->equipItem(Item $item) -> if item.equipable === true
// Personnage->attackTarget(Personnage $target)

date_default_timezone_set('Europe/Paris');

$joueur1 = new Mage();
$joueur1->setNom('SauronMan');

$joueur2 = new Archer();
$joueur2->setNom('LegoLand');

var_dump($joueur1, '___________', $joueur2);