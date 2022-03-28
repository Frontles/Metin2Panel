<?php

function setPos($getPos)

{

    if ($getPos >= '-1' and $getPos < '4') {

        return $getPos + 1;

    } elseif ($getPos == '4') {

        return $getPos + 6;

    } elseif ($getPos >= '10' and $getPos < '14') {

        return $getPos + 1;

    } elseif ($getPos == '14') {

        return $getPos + 6;

    } elseif ($getPos >= '20' and $getPos < '24') {

        return $getPos + 1;

    } elseif ($getPos == '24') {

        return $getPos + 6;

    } elseif ($getPos >= '30' and $getPos < '34') {

        return $getPos + 1;

    } elseif ($getPos == '34' and $getPos > '34') {

        return false;

    }

}


function product_buyfaq()

{


    global $db;
    global $account;
    global $player;
    $filter = new Filter();
    $functions = new Functions();
    $hashh = new Hash();

    $item_id = get('id');

    $itemNum = get('count');

    $token = get('hash');

    $faq_1 = $filter->numberFilter($_POST['faq_1']);

    $faq_2 = $filter->numberFilter($_POST['faq_2']);

    $faq_3 = $filter->numberFilter($_POST['faq_3']);

    $faq_4 = $filter->numberFilter($_POST['faq_4']);

    $faq_5 = $filter->numberFilter($_POST['faq_5']);

    if ($item_id == null || $token == null || $faq_1 === false || $faq_2 === false || $faq_3 === false || $faq_4 === false || $faq_5 === false) {

        $result = ["result" => false, "message" => "error", "data" => [400]];

    } else {

        $aId = session_get('user_id');

        $getInfo = $db->prepare('SELECT * FROM items WHERE item_id=:item_id');
        $getInfo->execute(['item_id' => $item_id]);

        if ($getInfo->rowCount() <= 0) {

            $result = ["result" => false, "message" => "error", "data" => [401]];

        } else {

            $getItem = $getInfo->fetch(PDO::FETCH_ASSOC);

            $itemId = $getItem['item_id'];

            $vNum = $getItem['vnum'];

            $tokenKey = settings('tokenkey');

            $hash = $hashh->create('sha256', $aId . $itemId . $vNum . $itemNum, $tokenKey);

            if ($hash != $token) {

                $result = ["result" => false, "message" => "error", "data" => [402]];

            } else {

                if ($getItem['durum'] != 1 and $getItem['durum'] != 2) {

                    $result = ["result" => false, "message" => "error", "data" => [403]];

                } else {

                    $getCoinsessor = $account->prepare('SELECT cash,mileage FROM account WHERE id=:id');
                    $getCoinsessor->execute(['id' => $aId]);
                    $getCoinses = $getCoinsessor->fetch(PDO::FETCH_ASSOC);

                    $getCoins = $getCoinses['cash'];

                    $getEm = $getCoinses['mileage'];

                    $coins = $getItem['coins'];

                    $getItemCount = $getItem["count_$itemNum"];

                    $getDiscountPercent = $getItem["discount_$itemNum"];

                    $totalPrice = intval(floor($getItemCount * ($coins - ($coins * $getDiscountPercent / 100))));

                    if ($getCoins < $totalPrice)

                        $result = ["result" => false, "message" => "coins", "data" => [$coins, $getCoins, $getItem['item_image'], $getItemCount]];

                    else {

                        $Possor = $account->prepare("SELECT pos FROM player.item WHERE owner_id = ? and window = ? ORDER BY pos DESC");
                        $Possor->execute([$aId, 'MALL']);
                        $Pos = $Possor->fetch(PDO::FETCH_ASSOC);

                        $getPos = (($Possor->rowCount()) > 0) ? $Pos['pos'] : -1;

                        if ($getPos >= '34')

                            $result = ["result" => false, "message" => "depo", "data" => [$coins, $getCoins, $getItem['item_image']]];

                        else {

                            $randId = rand(1000000000, 2147483640);

                            $controlId = $player->prepare('SELECT id FROM item WHERE id=:id');
                            $controlId->execute(['id' => $randId]);

                            if (($controlId->rowCount()) > 0)

                                $result = ["result" => false, "message" => "same", "data" => [404]];

                            else {

                                $faqArray = [$faq_1, $faq_2, $faq_3, $faq_4, $faq_5];

                                if ($getItem['faq_status'] !== "1")

                                    $result = ["result" => false, "message" => "faq_status", "data" => [406]];

                                else {

                                    if ($faq_1 === "0" || $faq_2 === "0" || $faq_3 === "0" || $faq_4 === "0" || $faq_5 === "0")

                                        $result = ["result" => false, "message" => "select_faq", "data" => [$coins, $getCoins, $getItem['item_image']]];

                                    else {

                                        $wear_flag = $getItem['wear_flag'];

                                        $getItemAttr = $player->prepare("SELECT apply,lv5 FROM player.item_attr WHERE $wear_flag = ?");
                                        $getItemAttr->execute(['5']);


                                        $rightFaq = array();

                                        $faqKey = 0;

                                        foreach ($getItemAttr as $key => $attr_1) {

                                            if ($functions->item_attr_name($attr_1['apply'])[0] !== $getItem['applytype0'] && $functions->item_attr_name($attr_1['apply'])[0] !== $getItem['applytype1'] && $functions->item_attr_name($attr_1['apply'])[0] !== $getItem['applytype2']) {

                                                if (in_array($functions->item_attr_name($attr_1['apply'])[0], $faqArray)) {

                                                    $rightFaq[$faqKey] = [$functions->item_attr_name($attr_1['apply'])[0], $attr_1['lv5']];

                                                    $faqKey++;

                                                }

                                            }

                                        }

                                        if (count($rightFaq) < 5)

                                            $result = ["result" => false, "message" => "false_faq_select", "data" => [$coins, $getCoins, $getItem['item_image']]];

                                        else {

                                            $newCoins = $getCoins - $totalPrice;

                                            $newEm = $getEm + $totalPrice;

                                            $sorgu = $account->prepare('UPDATE account SET 
                                                cash=:cash,
                                                mileage=:mileage WHERE id=' . $aId);
                                            $sorgu->execute([
                                                'cash' => $newCoins, 'mileage' => $newEm
                                            ]);


                                            $owner_id = $aId;

                                            $window = 'MALL';

                                            $pos = setPos($getPos);

                                            $item_name = $getItem['item_name'];

                                            $item_image = $getItem['item_image'];

                                            $count = $getItemCount;

                                            $vnum = $getItem['vnum'];

                                            $socket0 = $getItem['socket0'];

                                            $socket1 = $getItem['socket1'];

                                            $socket2 = $getItem['socket2'];

                                            $attrtype1 = $rightFaq[0][0];

                                            $attrtype2 = $rightFaq[1][0];

                                            $attrtype3 = $rightFaq[2][0];

                                            $attrtype4 = $rightFaq[3][0];

                                            $attrtype5 = $rightFaq[4][0];

                                            $attrtype6 = $getItem['attrtype6'];

                                            $attrtype7 = $getItem['attrtype7'];

                                            $attrvalue1 = $rightFaq[0][1];

                                            $attrvalue2 = $rightFaq[1][1];

                                            $attrvalue3 = $rightFaq[2][1];

                                            $attrvalue4 = $rightFaq[3][1];

                                            $attrvalue5 = $rightFaq[4][1];

                                            $attrvalue6 = $getItem['attrvalue6'];

                                            $attrvalue7 = $getItem['attrvalue7'];

                                            $date = date("Y-m-d H:i:s");

                                            if ($getItem['item_time'] == '1') {

                                                $sorgu2 = $player->prepare("INSERT INTO player.item (id, owner_id, window, pos, count, vnum, socket0, socket1, socket2, attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6) VALUES (?,?,?,?,?,?,UNIX_TIMESTAMP(NOW())+?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                $sorgu2->execute([$randId, $owner_id, $window, $pos, $count, $vnum, $socket0, $socket1, $socket2, $attrtype1, $attrvalue1, $attrtype2, $attrvalue2, $attrtype3, $attrvalue3, $attrtype4, $attrvalue4, $attrtype5, $attrvalue5, $attrtype6, $attrvalue6, $attrtype7, $attrvalue7]);


                                                $sorgu3 = $db->prepare(' INSERT INTO items_log SET 
                                                account_id=:account_id,
                                                item_id=:item_id,
                                                vnum=:vnum,
                                                item_name=:item_name,
                                                tur=:tur,
                                                coins=:coins,
                                                adet=:adet,
                                                tarih=:tarih');
                                                $sorgu3->execute([
                                                    'account_id' => $aId,
                                                    'item_id' => $vnum,
                                                    'vnum' => $vnum,
                                                    'item_name' => $item_name,
                                                    'tur' => '1',
                                                    'coins' => $coins,
                                                    'adet' => $count,
                                                    'tarih' => $date]);


                                            } elseif ($getItem['item_time'] == '0') {

                                                $sorgu4 = $player->prepare("INSERT INTO player.item (id, owner_id, window, pos, count, vnum, socket0, socket1, socket2, attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                $sorgu4->execute([$randId, $owner_id, $window, $pos, $count, $vnum, $socket0, $socket1, $socket2, $attrtype1, $attrvalue1, $attrtype2, $attrvalue2, $attrtype3, $attrvalue3, $attrtype4, $attrvalue4, $attrtype5, $attrvalue5, $attrtype6, $attrvalue6, $attrtype7, $attrvalue7]);

                                                $sorgu3 = $db->prepare(' INSERT INTO items_log SET 
                                                account_id=:account_id,
                                                item_id=:item_id,
                                                vnum=:vnum,
                                                item_name=:item_name,
                                                tur=:tur,
                                                coins=:coins,
                                                adet=:adet,
                                                tarih=:tarih');
                                                $sorgu3->execute([
                                                    'account_id' => $aId,
                                                    'item_id' => $vnum,
                                                    'vnum' => $vnum,
                                                    'item_name' => $item_name,
                                                    'tur' => '1',
                                                    'coins' => $coins,
                                                    'adet' => $count,
                                                    'tarih' => $date]);

                                            }

                                            $result['result'] = true;

                                            $result['data'] = array($item_name, $item_image, $newCoins, $newEm);

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

    }

    return $result;

}


require shop_view('product-buy_faq');