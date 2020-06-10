<?php

return [
    'sitename' => 'MillionLivePortal',
    'version' => '5.3.0 EpisodeTiara',
    'phrase' => 'A princess, who dreams earnestly.',

    'homeCardName' => env('HOME_CARD_NAME','yurikonanao_sunshinegirlofbeach'),
    'clockCardName' => env('CLOCK_CARD_NAME','shihokitazawa_therapistonboat'),
    'homeCardForce' => env('HOME_CARD_FORCE',false),
    'clockDefaultMode' => env('CLOCK_DEFAULT_MODE','normal'),

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
