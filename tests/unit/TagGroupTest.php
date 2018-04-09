<?php

class TagGroupTest extends \PHPUnit\Framework\TestCase
{
    public function testDuplicateTagIsRemoved()
    {
        $tags = 'active_subscriber|expired_subscriber|not_downloaded_free_product|downloaded_iap_product_unknown';
        $tagMapping = TagGroup::extractValidTags($tags);

        $this->assertEquals(3, count($tagMapping));

        $this->assertEquals('', $tagMapping['subscription_status']);
        $this->assertEquals('not_downloaded_free_product', $tagMapping['has_downloaded_free_product_status']);
        $this->assertEquals('downloaded_iap_product_unknown', $tagMapping['has_downloaded_iap_product_status']);
    }

    public function testDuplicateTagIsRemovedForMoreThanOneGroup()
    {
        $tags = 'active_subscriber|expired_subscriber|not_downloaded_free_product|not_downloaded_free_product|downloaded_iap_product_unknown';
        $tagMapping = TagGroup::extractValidTags($tags);

        $this->assertEquals(3, count($tagMapping));

        $this->assertEquals('', $tagMapping['subscription_status']);
        $this->assertEquals('', $tagMapping['has_downloaded_free_product_status']);
        $this->assertEquals('downloaded_iap_product_unknown', $tagMapping['has_downloaded_iap_product_status']);
    }

    public function testValidTagsAreReturned()
    {
        $tags = 'active_subscriber|not_downloaded_free_product|downloaded_iap_product_unknown';
        $tagMapping = TagGroup::extractValidTags($tags);

        $this->assertEquals(3, count($tagMapping));

        $this->assertEquals('active_subscriber', $tagMapping['subscription_status']);
        $this->assertEquals('not_downloaded_free_product', $tagMapping['has_downloaded_free_product_status']);
        $this->assertEquals('downloaded_iap_product_unknown', $tagMapping['has_downloaded_iap_product_status']);
    }

    public function testEmptyArrayIsReturnedWhenNoTagsExist()
    {
        $tags = '';

        $tagMapping = TagGroup::extractValidTags($tags);
        $this->assertEquals(0, count($tagMapping));
    }
}