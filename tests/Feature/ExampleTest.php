<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBeOkWhenSeeIndexPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('產品分類');

        // 確認 Category 的資料有顯示
        $response->assertSee('未分類');

        $response->assertSee('管理員頁面');
        $response->assertSee('聯絡我們');
        $response->assertSee('查看購物車');
        $response->assertSee('回首頁');
    }

    /**
     * @test
     */
    public function shouldDontSeeSmartyTagSeeIndexPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertDontSee('<%');
        $response->assertDontSee('%>');
    }

    /**
     * @test
     */
    public function shouldBeOkWhenSeeAdminPage()
    {
        $response = $this->get('/admin.php');

        $response->assertStatus(200);
        $response->assertSee('管理功能');
        $response->assertSee('統計功能');
    }
}