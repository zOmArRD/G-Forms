<?php
/*
 * Created by PhpStorm.
 *
 * User: zOmArRD
 * Date: 22/8/2022
 *
 *
 *        $$$$$$\  $$\                             $$\     $$\           $$\      $$\  $$$$$$\
 *       $$  __$$\ $$ |                            $$ |    $$ |          $$$\    $$$ |$$  __$$\
 *       $$ /  \__|$$$$$$$\   $$$$$$\   $$$$$$$\ $$$$$$\   $$ |$$\   $$\ $$$$\  $$$$ |$$ /  \__|
 *       $$ |$$$$\ $$  __$$\ $$  __$$\ $$  _____|\_$$  _|  $$ |$$ |  $$ |$$\$$ $$ |$$ |
 *       $$ |\_$$ |$$ |  $$ |$$ /  $$ |\$$$$\    $$ |    $$ |$$ |  $$ |$$ \$  $$ |$$ |
 *       $$ |  $$ |$$ |  $$ |$$ |  $$ | \____$$\   $$ |$$\ $$ |$$ |  $$ |$$ |\$  /$$ |$$ |  $$\
 *       \$$$$  |$$ |  $$ |\$$$$  |$$$$$$$  |  \$$  |$$ |\$$$$$ |$$ | \_/ $$ |\$$$$  |
 *        \______/ \__|  \__| \______/ \_______/    \____/ \__| \____$$ |\__|     \__| \______/
 *                                                             $$\   $$ |
 *                                                             \$$$$  |
 *                                                              \______/
 *
 *  Copyright © 2022 GhostlyMC Network (omar@ghostlymc.live) - All Rights Reserved.
 */
declare(strict_types=1);

namespace GhostlyMC\Forms;

class GForms {
    /**
     * Create a new SimpleForm
     *
     * @param callable $callable
     *
     * @return SimpleForm
     */
    public static function createSimpleForm(callable $callable): SimpleForm {
        return new SimpleForm($callable);
    }

    /**
     * Create a new ModalForm
     *
     * @param callable $callable
     *
     * @return ModalForm
     */
    public static function createModalForm(callable $callable): ModalForm {
        return new ModalForm($callable);
    }

    /**
     * Create a new CustomForm
     *
     * @param callable $callable
     *
     * @return CustomForm
     */
    public static function createCustomForm(callable $callable): CustomForm {
        return new CustomForm($callable);
    }
}