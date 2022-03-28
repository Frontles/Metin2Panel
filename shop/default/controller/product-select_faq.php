<?php

function select_faq()

{

    $filter = new Filter();
    $hashh = new Hash();
    $functions = new Functions();
    global $db;
    global $player;

    $faq = $filter->numberFilter($_POST['faq']);

    $hash = $filter->mainFilter($_POST['hash']);

    $item_id = $filter->numberFilter($_POST['item_id']);

    $vnum = $filter->numberFilter($_POST['vnum']);

    $aId = session_get('user_id');

    $hashControl = $hashh->create('sha256',$aId.$item_id.$vnum.'1',settings('tokenkey'));

    if ($hash === false || $item_id === false || $vnum === false || $faq === false)

        $return = ["data"=>"0"];

    elseif($hash !== $hashControl)

        $return = ["data"=>"0"];

    else

    {

        $getItemDatasor = $db->prepare('SELECT faq_status,wear_flag,applytype0,applytype1,applytype2 FROM items WHERE item_id=:item_id');
        $getItemDatasor->execute(['item_id'=>$item_id]);
        $getItemData = $getItemDatasor->fetch(PDO::FETCH_ASSOC);
        if (($getItemDatasor->rowCount()) <= 0)

            $return = ["data"=>"0"];

        else

        {

            $ItemData = $getItemData;

            if ($ItemData['faq_status'] !== "1")

                $return = ["data"=>"0"];

            else

            {

                $wear_flag = $ItemData['wear_flag'];

                $getItemAttr = $player->prepare("SELECT apply,lv5 FROM player.item_attr WHERE $wear_flag = ?");
                $getItemAttr->execute(['5']);

                $rightFaq = array();

                foreach ($getItemAttr as $key => $attr_1)

                {

                    if($functions->item_attr_name($attr_1['apply'])[0] !== $ItemData['applytype0'] && $functions->item_attr_name($attr_1['apply'])[0] !== $ItemData['applytype1'] && $functions->item_attr_name($attr_1['apply'])[0] !== $ItemData['applytype2'])

                    {

                        $rightFaq[$key] = $functions->item_attr_name($attr_1['apply'])[0];

                    }

                }

                if (in_array($faq,$rightFaq))

                    $return = ["data"=>$faq];

                else

                    $return = ["data"=>"0"];

            }

        }

    }

    echo json_encode($return);

}

$selectfaq = select_faq();
