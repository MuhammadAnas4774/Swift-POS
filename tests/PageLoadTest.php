<?php

use PHPUnit\Framework\TestCase;

class PageLoadTest extends TestCase
{
    public function testIndexPageExists(): void
    {
        $this->assertFileExists(__DIR__ . '/../index.php');
    }

    public function testIndexPageContainsQuickPOS(): void
    {
        $content = file_get_contents(__DIR__ . '/../index.php');

        $this->assertStringContainsString('QuickPOS', $content);
    }
}
