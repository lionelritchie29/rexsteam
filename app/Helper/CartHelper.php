<?php


namespace App\Helper;


use Illuminate\Support\Facades\Cookie;

class CartHelper
{
    private static $ONE_DAY_IN_MINUTES = 1440;

    public static function add($game_id) {
        $game_ids_in_cart = null;

        if (Cookie::get(Constant::$CART_KEY)) {
            $game_ids_in_cart = CartHelper::get();
        }

        if ($game_ids_in_cart == null)
            Cookie::queue(Constant::$CART_KEY, $game_id, CartHelper::$ONE_DAY_IN_MINUTES);
        else {
            if (in_array($game_id, $game_ids_in_cart)) {
                return false;
            }

            array_push($game_ids_in_cart, $game_id);
            Cookie::queue(Constant::$CART_KEY, join(',', $game_ids_in_cart),CartHelper::$ONE_DAY_IN_MINUTES);
        }

        return true;
    }

    public static function delete($game_id) {
        $game_ids_in_cart = CartHelper::get();

        $index = array_search($game_id, $game_ids_in_cart);
        unset($game_ids_in_cart[$index]);

        Cookie::queue(Constant::$CART_KEY, join(',', $game_ids_in_cart), CartHelper::$ONE_DAY_IN_MINUTES);
    }

    public static function get() {
        return explode(',', Cookie::get(Constant::$CART_KEY));
    }

    public static function isCartExist() {
        return Cookie::get(Constant::$CART_KEY);
    }

    public static function clear() {
        Cookie::queue(Constant::$CART_KEY, "", CartHelper::$ONE_DAY_IN_MINUTES * -1);
    }
}
