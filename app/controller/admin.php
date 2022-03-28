<?php

if (!route(1)){
    $route[1]= 'index';
}
if (!file_exists(admin_controller(route(1)))){
    $route[1]= 'index';
}
if (!session('admin_rank') || session('admin_rank')==3){
    $route[1]= 'login';
}

$menus= [
    'index'=>[
        'title'=>'Anasayfa',
        'icon'=>'home',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'statics'=>'Tüm istatistikleri Görüntüleme'
        ]
    ],
    'shop'=>[
        'title'=>'Market Yönetimi',
        'icon'=>'shopping-bag',
        'permissions'=>[
            'show'=>'Tümünü Görüntüle',
            'item-edit'=>'İtem Düzenleme',
            'item-add'=>'İtem Ekleme',
            'item-delete'=>'İtem Silme',
            'category-add'=>'Kategori Ekleme',
            'category-delete'=>'Kategori Silme',
            'wheel-item-add'=>'Çark Eşya Ekleme',
            'wheel-item-delete'=>'Çark Eşya Silme',
        ],
        'submenu'=>[
            'items?sayfa=1'=> 'Eşya Ekle',
            'item-list'=> 'Eşya Listesi',
            'add-category'=> 'Kategori Ekle',
            'category-list'=> 'Kategori Listesi',
            'wheels'=>'Çark Eşya Ekle',
            'wheel-item-list'=>'Çark Eşya Listesi'
        ]
    ],

    'tickets'=>[
        'title'=>'Ticket Yönetimi',
        'icon'=>'ticket',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'send'=>'Cevap Gönderme',
            'lock'=>'Kilitleme',
            'ban'=>' Banlama'
        ],
        'submenu'=>[
            'read-tickets'=> ' <i class="fa fa-send"> </i> Yanıtlanmış Ticketlar ',
            'unread-tickets'=> '<i class="fa fa-send-o"> </i> Yanıtlanmamış Ticketlar'

        ]
    ],

    'coupon'=>[
    'title'=>'Kupon Yönetimi',
    'icon'=>'barcode',
    'permissions'=>[
        'show'=>'Görüntüleme',
        'add'=>'Ekleme',
        'delete'=>'Silme'
    ],
    'submenu'=>[
        'add-coupons'=> 'Kupon Oluştur',
        'used-coupons'=> 'Kullanılmış Kuponlar',
        'unused-coupons'=> 'Kullanılmamış Kuponlar'
        ]
    ],
    'users'=>[
        'title'=> 'Yönetici Ayarları',
        'icon'=>'user',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'edit'=>'Düzenleme',
            'add'=>'Ekleme',
            'izinekle'=>'Yetki Verme-Alma',
            'delete'=>'Silme'
        ],
         'submenu'=>[
             'add-admin'=> 'Yönetici Ekle',
             'admin-list'=> 'YöneticiLeri Listele'
         ]
    ],
    'events'=>[
        'title'=>'Event Ayarları',
        'icon'=>'ellipsis-v',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'edit'=>'Düzenleme',
            'event-open'=>'Açma',
            'event-plan'=>'Planlama',
            'active-event-close'=>'Aktif Event Kapatma',
            'delete'=>'Silme'

        ],
        'submenu'=>[
            'add-event'=> 'Event Aç',
            'event-list'=> 'Event Listesi',
            'event-plan'=>'Event Planla'
        ]

    ],
    'accounts'=>[
        'title'=>'Hesap Yönetimi',
        'icon'=>'user',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'edit'=>'Düzenleme',
            'add'=>'Ekleme',
            'ban'=>'Banlama',
            'search'=>'Arama',
            'ep-delete'=>'EP Silme'

        ],
        'submenu'=>[
            'add-account'=> 'Hesap Aç',
            'account-gotep'=> 'Epi Olan Hesaplar'

        ]

    ],'logs'=>[
        'title'=>'Log Kayıtları',
        'icon'=>'bars',
        'permissions'=>[
            'show'=>'Görüntüleme'
        ],
        'submenu'=>[
            'shop-log'=> 'Market Logları',
            'ban-log'=> 'Ban Logları'

        ]

    ],
    
    

    'news'=>[
        'title'=>'Haber Yönetimi',
        'icon'=>'newspaper-o',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'news-edit'=>'Haber Düzenleme',
            'news-add'=>'Haber Ekleme',
            'news-delete'=>'Haber Silme',
            'shop-news-add'=>'Market Haber Ekle',
            'shop-news-delete'=>'Market Haber Silme',
        ],
        'submenu'=>[
            'add-news'=> 'Haber Ekle',
            'news-list'=> 'Haber Listesi',
            'shop-add-news'=> ' Market Haber Ekle',
            'shop-news-list'=> 'Market Haber Listesi'
        ]
        
        ],

    'sockets'=>[
        'title'=>'Socket İşlemleri',
        'icon'=>'code',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'open-drop'=>'Drop Açma',
            'dc-at'=>'DC At',
            'chat-ban'=>'Chat Ban',
            'notice'=>'Duyuru Geç'
        ],
        'submenu'=>[
            'socket-drop'=> 'Dropları Aç',
            'socket-dc'=> 'DC Atma',
            'socket-chat'=> ' Chat Ban',
            'socket-notice'=> 'Oyun İçi Duyuru'
        ]
    
    ],
    'packs'=>[
        'title'=>'Pack Yönetimi',
        'icon'=>'files-o',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'add'=>'Ekleme',
            'delete'=>'Silme'
        ],
        'submenu'=>[
            'add-pack'=> 'Pack Ekle',
            'pack-list'=> 'Pack Listesi',

        ]
    ],

    'item-search'=>[
        'title'=>'Eşya Ara',
        'icon'=>'search',
        'permissions'=>[
            'show'=>'Görüntüleme'
        ],

    ],
    'database-settings'=>[
        'title'=>'Database Ayarları',
        'icon'=>'database',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'edit'=>'Düzenleme'
        ]
    ],
    'settings'=>[
        'title'=>'Ayarlar',
        'icon'=>'cog',
        'permissions'=>[
            'show'=>'Görüntüleme',
            'edit'=>'Düzenleme',
        ]
    ],
];
require admin_controller(route(1));