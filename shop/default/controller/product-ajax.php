<?php




function product_ajax($arg)

{




    global $db;
    $aId = $_SESSION['user_id'];

    $itemId = $arg;


    $getItemInfo = $db->prepare('SELECT * FROM items WHERE item_id=:item_id');
    $getItemInfo->execute([
        'item_id' => $itemId
    ]);

    if ($getItemInfo->rowCount() <= 0) {

        exit("404 NOT FOUND");

    } else {

        $itemInfo = $getItemInfo->fetch(PDO::FETCH_ASSOC);

        if ($itemInfo['durum'] != 1 and $itemInfo['durum'] != 2) {

            exit("404 NOT FOUND");

        } else {

            $vnum = $itemInfo['vnum'];

            $tokenKey = settings('tokenkey');

            $tokens = md5($aId . $itemId . $vnum . $tokenKey);

            $token = filter_var($_GET['token'], FILTER_SANITIZE_URL);

            if ($token != $tokens) {

                exit("404 NOT FOUND");

            } else {

                $result['item'] = $itemInfo;

                $categoryId = $itemInfo['kategori_id'];

                $categoryresult = $db->prepare('SELECT id,name FROM shop_menu WHERE id=:id');
                $categoryresult->execute([
                    'id' => $categoryId
                ]);
                $result['category'] = $categoryresult->fetch(PDO::FETCH_ASSOC);


            }

        }

    }
    return $result;
}


require shop_view('product-ajax');
