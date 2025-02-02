<?php

/*
*
*__     __        ____  _             _ _       
*\ \   / /__ _ __/ ___|| |_ _   _  __| (_) ___  
* \ \ / / __| '__\___ \| __| | | |/ _` | |/ _ \ 
*  \ V /\__ \ |   ___) | |_| |_| | (_| | | (_) |
*   \_/ |___/_|  |____/ \__|\__,_|\__,_|_|\___/ 
*
* This plugin was created by VsrStudio
* Warning Not To Sell Plugins Or Change Author
*/

declare(strict_types=1);

namespace VsrStudio\RankGUI;

use muqsit\customsizedinvmenu\CustomSizedInvMenu;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use muqsit\invmenu\transaction\SimpleInvMenuTransaction;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\block\VanillaBlocks;
use pocketmine\item\VanillaItems;
use pocketmine\world\sound\AnvilUseSound;

class RankGUI extends PluginBase {

    private array $ranks = [];
    private array $rules = [];

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->ranks = $this->getConfig()->get("ranks", []);
        $this->rules = $this->getConfig()->get("rules", []);
        $timezone = $this->getConfig()->get("timezone", "Asia/Jakarta");
        date_default_timezone_set($timezone);
        if (!class_exists(CustomSizedInvMenu::class) || !class_exists(InvMenu::class)) {
            $this->getLogger()->warning("InvMenu or CustomSizedInvMenu class not found. Please ensure dependencies are properly installed.");
        } else {
            $this->getLogger()->info("InvMenu and CustomSizedInvMenu are successfully loaded.");
        }
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "ranklist") {
            if (!$sender instanceof Player) {
                $sender->sendMessage("§cThis command can only be used in game!");
                return false;
            }

            if (!$sender->hasPermission("rankgui.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }

            $this->openRankList($sender);
            return true;
        }

        if ($command->getName() === "rules") {
            if (!$sender instanceof Player) {
                $sender->sendMessage("§cThis command can only be used in game!");
                return false;
            }

            $this->openRulesGui($sender);
            return true;
        }

        return false;
    }

    public function openRankList(Player $player): void {
        $menu = CustomSizedInvMenu::create(36);
        $menu->setName("§l§d⚡ Rank List ⚡");

        $glow = new EnchantmentInstance(VanillaEnchantments::UNBREAKING(), 1);

        $rankSlots = [10, 11, 12, 14, 15, 16, 19, 20, 21, 23, 24, 25]; 
        shuffle($rankSlots);
        $index = 0;

        foreach ($this->ranks as $rank) {
            if ($index >= count($rankSlots)) break;

            $item = ItemRegistry::getItemByName($rank["icon"]);
            $item->setCustomName("§b" . $rank["name"]);
            $currentDateTime = date("Y-m-d H:i:s");

            $lore = is_array($rank["lore"]) ? 
                array_map(fn($line) => "§e" . str_replace(["{player}", "{time}", "{date}"], [$player->getName(), date("H:i:s"), date("Y-m-d")], $line), $rank["lore"]) : 
                ["§e" . str_replace(["{player}", "{time}", "{date}"], [$player->getName(), date("H:i:s"), date("Y-m-d")], $rank["lore"])];

            $item->setLore($lore);
            $item->addEnchantment($glow);

            $menu->getInventory()->setItem($rankSlots[$index], $item);
            $index++;
        }

        $glassPane = VanillaBlocks::STAINED_GLASS_PANE()->asItem()->setCustomName(" ");
        for ($i = 0; $i < 36; $i++) {
            if (!in_array($i, $rankSlots)) {
                $menu->getInventory()->setItem($i, $glassPane);
            }
        }

        $player->getWorld()->addSound($player->getPosition(), new AnvilUseSound());

        $menu->setListener(function (SimpleInvMenuTransaction $transaction): InvMenuTransactionResult {
            return $transaction->discard();
        });

        $menu->send($player);
    }

    public function openRulesGui(Player $player): void {
        $menu = CustomSizedInvMenu::create(18);
        $menu->setName("§l§d⚡ Server Rules ⚡");

        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");

        if (isset($this->rules['rules1'])) {
            $rules1Book = VanillaItems::BOOK();
            $rules1Book->setCustomName(str_replace("{player}", $player->getName(), $this->rules['rules1']['name']));
            $rules1Lore = $this->rules['rules1']['lore'];
            $rules1Lore = array_map(function($line) use ($player, $currentDate, $currentTime) {
                return str_replace(
                    ["{player}", "{date}", "{time}"], 
                    [$player->getName(), $currentDate, $currentTime], 
                    $line
                );
            }, $rules1Lore);

            $glow = new EnchantmentInstance(VanillaEnchantments::UNBREAKING(), 1);
            $rules1Book->setLore($rules1Lore);
            $rules1Book->addEnchantment($glow);
            $menu->getInventory()->setItem(3, $rules1Book);
        }

        if (isset($this->rules['rules2'])) {
            $rules2Book = VanillaItems::BOOK();
            $rules2Book->setCustomName(str_replace("{player}", $player->getName(), $this->rules['rules2']['name']));
            $rules2Lore = $this->rules['rules2']['lore'];
            $rules2Lore = array_map(function($line) use ($player, $currentDate, $currentTime) {
                return str_replace(
                    ["{player}", "{date}", "{time}"], 
                    [$player->getName(), $currentDate, $currentTime], 
                    $line
                );
            }, $rules2Lore);

            $glow = new EnchantmentInstance(VanillaEnchantments::UNBREAKING(), 1);
            $rules2Book->setLore($rules2Lore);
            $rules2Book->addEnchantment($glow);
            $menu->getInventory()->setItem(5, $rules2Book);
        }

        if (isset($this->rules['rules3'])) {
            $rules3Book = VanillaItems::BOOK();
            $rules3Book->setCustomName(str_replace("{player}", $player->getName(), $this->rules['rules3']['name']));
            $rules3Lore = $this->rules['rules3']['lore'];
            $rules3Lore = array_map(function($line) use ($player, $currentDate, $currentTime) {
                return str_replace(
                    ["{player}", "{date}", "{time}"], 
                    [$player->getName(), $currentDate, $currentTime], 
                    $line
                );
            }, $rules3Lore);

            $glow = new EnchantmentInstance(VanillaEnchantments::UNBREAKING(), 1);
            $rules3Book->setLore($rules3Lore);
            $rules3Book->addEnchantment($glow);
            $menu->getInventory()->setItem(7, $rules3Book);
        }

        $glassPane = VanillaBlocks::STAINED_GLASS_PANE()->asItem()->setCustomName(" ");
        for ($i = 0; $i < 18; $i++) {
            if (!in_array($i, [3, 5, 7])) {
                $menu->getInventory()->setItem($i, $glassPane);
            }
        }

        $player->getWorld()->addSound($player->getPosition(), new AnvilUseSound());

        $menu->setListener(function (SimpleInvMenuTransaction $transaction): InvMenuTransactionResult {
            return $transaction->discard();
        });

        $menu->send($player);
    }
}
