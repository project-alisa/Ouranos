<?php

return [
    'sitename' => 'MillionLivePortal',
    'version' => '1.1.1 Angelic Parade',
    'phrase' => 'Let\'s cast the first magic',
    'cardname' => env('CARD_NAME','shihokitazawa_therapistonboat'),

    'googleAnalytics' => env('GOOGLE_ANALYTICS','UA-000000000-0'),

    'acceptableLangs' => array('ja','en','ko-KR','zh-CN'),

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
