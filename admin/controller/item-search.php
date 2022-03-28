<?php

if (!permission('item-search', 'show')) {
    permission_page();
}
require admin_view('item-search');