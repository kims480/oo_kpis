<?php namespace Tests\Repositories;

use App\Models\otc_sites;
use App\Repositories\otc_sitesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class otc_sitesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var otc_sitesRepository
     */
    protected $otcSitesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->otcSitesRepo = \App::make(otc_sitesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_otc_sites()
    {
        $otcSites = otc_sites::factory()->make()->toArray();

        $createdotc_sites = $this->otcSitesRepo->create($otcSites);

        $createdotc_sites = $createdotc_sites->toArray();
        $this->assertArrayHasKey('id', $createdotc_sites);
        $this->assertNotNull($createdotc_sites['id'], 'Created otc_sites must have id specified');
        $this->assertNotNull(otc_sites::find($createdotc_sites['id']), 'otc_sites with given id must be in DB');
        $this->assertModelData($otcSites, $createdotc_sites);
    }

    /**
     * @test read
     */
    public function test_read_otc_sites()
    {
        $otcSites = otc_sites::factory()->create();

        $dbotc_sites = $this->otcSitesRepo->find($otcSites->id);

        $dbotc_sites = $dbotc_sites->toArray();
        $this->assertModelData($otcSites->toArray(), $dbotc_sites);
    }

    /**
     * @test update
     */
    public function test_update_otc_sites()
    {
        $otcSites = otc_sites::factory()->create();
        $fakeotc_sites = otc_sites::factory()->make()->toArray();

        $updatedotc_sites = $this->otcSitesRepo->update($fakeotc_sites, $otcSites->id);

        $this->assertModelData($fakeotc_sites, $updatedotc_sites->toArray());
        $dbotc_sites = $this->otcSitesRepo->find($otcSites->id);
        $this->assertModelData($fakeotc_sites, $dbotc_sites->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_otc_sites()
    {
        $otcSites = otc_sites::factory()->create();

        $resp = $this->otcSitesRepo->delete($otcSites->id);

        $this->assertTrue($resp);
        $this->assertNull(otc_sites::find($otcSites->id), 'otc_sites should not exist in DB');
    }
}
