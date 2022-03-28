<?php


if (!permission('shop', 'show')){

    permission_page();
}
require admin_view('wheels');