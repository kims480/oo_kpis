<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\otc_sites;

class otc_sitesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_otc_sites()
    {
        $otcSites = otc_sites::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/otc_sites', $otcSites
        );

        $this->assertApiResponse($otcSites);
    }

    /**
     * @test
     */
    public function test_read_otc_sites()
    {
        $otcSites = otc_sites::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/otc_sites/'.$otcSites->id
        );

        $this->assertApiResponse($otcSites->toArray());
    }

    /**
     * @test
     */
    public function test_update_otc_sites()
    {
        $otcSites = otc_sites::factory()->create();
        $editedotc_sites = otc_sites::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/otc_sites/'.$otcSites->id,
            $editedotc_sites
        );

        $this->assertApiResponse($editedotc_sites);
    }

    /**
     * @test
     */
    public function test_delete_otc_sites()
    {
        $otcSites = otc_sites::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/otc_sites/'.$otcSites->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/otc_sites/'.$otcSites->id
        );

        $this->response->assertStatus(404);
    }
}
