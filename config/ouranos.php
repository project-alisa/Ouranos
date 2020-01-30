<?php

return [
    'sitename' => 'MillionLivePortal',
    'version' => '2.1.0 BlueSymphony',
    'phrase' => 'Flap your wings, our song!',
    'cardname' => env('CARD_NAME','shihokitazawa_therapistonboat'),

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
