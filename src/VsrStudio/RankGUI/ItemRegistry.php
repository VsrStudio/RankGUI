<?php

declare(strict_types=1);

namespace VsrStudio\RankList;

use pocketmine\item\Item;
use pocketmine\item\VanillaItems;

class ItemRegistry {

    /**
     * Function to get item by name
     * 
     * @param string $name Nama item
     * @return Item
     */
    public static function getItemByName(string $name): Item {
        return match (strtolower($name)) {
            "golden_apple" => VanillaItems::GOLDEN_APPLE(),
            "diamond" => VanillaItems::DIAMOND(),
            "nether_star" => VanillaItems::NETHER_STAR(),
            "dragon_breath" => VanillaItems::DRAGON_BREATH(),
            "experience_bottle" => VanillaItems::EXPERIENCE_BOTTLE(),
            "paper" => VanillaItems::PAPER(),
            "stone" => VanillaItems::STONE(),
            "wooden_sword" => VanillaItems::WOODEN_SWORD(),
            "iron_sword" => VanillaItems::IRON_SWORD(),
            "diamond_sword" => VanillaItems::DIAMOND_SWORD(),
            "bow" => VanillaItems::BOW(),
            "arrow" => VanillaItems::ARROW(),
            "golden_carrot" => VanillaItems::GOLDEN_CARROT(),
            "iron_helmet" => VanillaItems::IRON_HELMET(),
            "diamond_helmet" => VanillaItems::DIAMOND_HELMET(),
            "leather_chestplate" => VanillaItems::LEATHER_CHESTPLATE(),
            "iron_chestplate" => VanillaItems::IRON_CHESTPLATE(),
            "diamond_chestplate" => VanillaItems::DIAMOND_CHESTPLATE(),
            "netherite_leggings" => VanillaItems::NETHERITE_LEGGINGS(),
            "netherite_boots" => VanillaItems::NETHERITE_BOOTS(),
            "shield" => VanillaItems::SHIELD(),
            "bread" => VanillaItems::BREAD(),
            "cooked_porkchop" => VanillaItems::COOKED_PORKCHOP(),
            "oak_planks" => VanillaItems::OAK_PLANKS(),
            "stone_pickaxe" => VanillaItems::STONE_PICKAXE(),
            "golden_pickaxe" => VanillaItems::GOLDEN_PICKAXE(),
            "diamond_pickaxe" => VanillaItems::DIAMOND_PICKAXE(),
            "netherite_pickaxe" => VanillaItems::NETHERITE_PICKAXE(),
            "ender_pearl" => VanillaItems::ENDER_PEARL(),
            "splash_potion" => VanillaItems::SPLASH_POTION(),
            "fire_charge" => VanillaItems::FIRE_CHARGE(),
            "pumpkin_pie" => VanillaItems::PUMPKIN_PIE(),
            "lava_bucket" => VanillaItems::LAVA_BUCKET(),
            "water_bucket" => VanillaItems::WATER_BUCKET(),
            "mob_head" => VanillaItems::PLAYER_HEAD(),
            "coal_ore" => VanillaItems::COAL_ORE(),
            "diamond_ore" => VanillaItems::DIAMOND_ORE(),
            "iron_ore" => VanillaItems::IRON_ORE(),
            "gold_ore" => VanillaItems::GOLD_ORE(),
            "coal" => VanillaItems::COAL(),
            "iron_ingot" => VanillaItems::IRON_INGOT(),
            "gold_ingot" => VanillaItems::GOLD_INGOT(),
            "netherite_ingot" => VanillaItems::NETHERITE_INGOT(),

            "wooden_axe" => VanillaItems::WOODEN_AXE(),
            "stone_axe" => VanillaItems::STONE_AXE(),
            "iron_axe" => VanillaItems::IRON_AXE(),
            "diamond_axe" => VanillaItems::DIAMOND_AXE(),
            "netherite_axe" => VanillaItems::NETHERITE_AXE(),

            "wooden_pickaxe" => VanillaItems::WOODEN_PICKAXE(),
            "stone_pickaxe" => VanillaItems::STONE_PICKAXE(),
            "iron_pickaxe" => VanillaItems::IRON_PICKAXE(),
            "diamond_pickaxe" => VanillaItems::DIAMOND_PICKAXE(),
            "netherite_pickaxe" => VanillaItems::NETHERITE_PICKAXE(),

            "wooden_shovel" => VanillaItems::WOODEN_SHOVEL(),
            "stone_shovel" => VanillaItems::STONE_SHOVEL(),
            "iron_shovel" => VanillaItems::IRON_SHOVEL(),
            "diamond_shovel" => VanillaItems::DIAMOND_SHOVEL(),
            "netherite_shovel" => VanillaItems::NETHERITE_SHOVEL(),

            "crossbow" => VanillaItems::CROSSBOW(),
            "leather_helmet" => VanillaItems::LEATHER_HELMET(),
            "leather_leggings" => VanillaItems::LEATHER_LEGGINGS(),
            "leather_boots" => VanillaItems::LEATHER_BOOTS(),
            "iron_leggings" => VanillaItems::IRON_LEGGINGS(),
            "iron_boots" => VanillaItems::IRON_BOOTS(),
            "diamond_leggings" => VanillaItems::DIAMOND_LEGGINGS(),
            "diamond_boots" => VanillaItems::DIAMOND_BOOTS(),
            "netherite_helmet" => VanillaItems::NETHERITE_HELMET(),
            "netherite_chestplate" => VanillaItems::NETHERITE_CHESTPLATE(),

            "apple" => VanillaItems::APPLE(),
            "cooked_beef" => VanillaItems::COOKED_BEEF(),
            "cooked_chicken" => VanillaItems::COOKED_CHICKEN(),
            "carrot" => VanillaItems::CARROT(),
            "cooked_mutton" => VanillaItems::COOKED_MUTTON(),
            "cooked_rabbit" => VanillaItems::COOKED_RABBIT(),
            "mushroom_stew" => VanillaItems::MUSHROOM_STEW(),
            "enchanted_golden_apple" => VanillaItems::ENCHANTED_GOLDEN_APPLE(),

            "potion" => VanillaItems::POTION(),
            "lingering_potion" => VanillaItems::LINGERING_POTION(),
            "chest" => VanillaItems::CHEST(),
            "trapped_chest" => VanillaItems::TRAPPED_CHEST(),
            "furnace" => VanillaItems::FURNACE(),
            "ender_chest" => VanillaItems::ENDER_CHEST(),
            "dropper" => VanillaItems::DROPPER(),
            "dispenser" => VanillaItems::DISPENSER(),
            "note_block" => VanillaItems::NOTE_BLOCK(),
            "jukebox" => VanillaItems::JUKEBOX(),
            "daylight_detector" => VanillaItems::DAYLIGHT_DETECTOR(),

            "tnt" => VanillaItems::TNT(),
            "lever" => VanillaItems::LEVER(),
            "tripwire_hook" => VanillaItems::TRIPWIRE_HOOK(),
            "bucket" => VanillaItems::BUCKET(),
            "minecart" => VanillaItems::MINECART(),
            "chest_minecart" => VanillaItems::CHEST_MINECART(),
            "hopper_minecart" => VanillaItems::HOPPER_MINECART(),
            "tnt_minecart" => VanillaItems::TNT_MINECART(),
            "furnace_minecart" => VanillaItems::FURNACE_MINECART(),
            default => VanillaItems::PAPER(), // Default item
        };
    }
}
