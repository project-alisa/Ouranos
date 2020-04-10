<?php

return [
    'sitename' => 'MillionLivePortal',
    'version' => '4.0.0 Dreamscape',
    'phrase' => 'I\'ll be the freedom wind, with you.',

    'homeCardName' => env('HOME_CARD_NAME','yurikonanao_sunshinegirlofbeach'),
    'clockCardName' => env('CLOCK_CARD_NAME','shihokitazawa_therapistonboat'),
    'homeCardForce' => env('HOME_CARD_FORCE',false),

    'googleAnalytics' => env('GOOGLE_ANALYTICS','UA-000000000-0'),

    'acceptableLangs' => array('ja','en','ko','zh-CN','zh-TW'),

    'acceptableTypes' => array('Princess','Fairy','Angel','Ex'),
    'mastodonFeedUrl' => 'https://mstdn.miyacorata.net/@ML_Portal.rss',
    'matsurihimeEndpointUrl' => 'https://api.matsurihi.me/mltd/v1/',

    'repositoryUrl' => 'https://github.com/project-alisa/Ouranos',

    'footerLinkUrls' => [
        'Crowdin' => 'https://crowdin.com/project/ouranos',
        '@ml_portal' => 'https://mstdn.miyacorata.net/@ml_portal',
    ],

    'defaultDescription' => 'MillionLivePortalは、アイドルマスターミリオンライブ！の非公式データベース＆ポータルサイトです。',
];
