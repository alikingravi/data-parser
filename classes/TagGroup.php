<?php

class TagGroup
{
    const tagGroups = [
        'subscription_status' => [
            'active_subscriber',
            'expired_subscriber',
            'never_subscribed',
            'subscription_unknown',
        ],
        'has_downloaded_free_product_status' => [
            'has_downloaded_free_product',
            'not_downloaded_free_product',
            'downloaded_free_product_unknown',
        ],
        'has_downloaded_iap_product_status' => [
            'has_downloaded_iap_product',
            'not_downloaded_iap_product',
            'downloaded_iap_product_unknown',
        ]
    ];

    public static function extractValidTags($tags)
    {
        $tagArray = explode('|', $tags);

        $validTags = [];

        $groupFound = [
            'subscription_status' => false,
            'has_downloaded_free_product_status' => false,
            'has_downloaded_iap_product_status' => false,
        ];

        foreach ($tagArray as $tag) {
            foreach (self::tagGroups as $key => $value) {
                if (in_array($tag, $value)) {
                    if (!$groupFound[$key]) {
                        $groupFound[$key] = true;
                        $validTags[$key] = $tag;
                    } else {
                        $validTags[$key] = '';
                    }
                }
            }
        }

        return $validTags;
    }
}