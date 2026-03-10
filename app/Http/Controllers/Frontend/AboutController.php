<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use App\Services\V2\Impl\RealEstate\PropertyService;
use App\Services\V2\Impl\RealEstate\PropertyFacilityService;
use App\Services\V2\Impl\RealEstate\FloorplanService;
use App\Services\V2\Impl\RealEstate\AgentService;
use App\Services\V2\Impl\RealEstate\GalleryService;
use App\Services\V2\Impl\RealEstate\LocationHighlightService;
use Illuminate\Http\Request;

class AboutController extends FrontendController
{
    public function __construct(
        protected PropertyService $propertyService,
        protected PropertyFacilityService $facilityService,
        protected FloorplanService $floorplanService,
        protected AgentService $agentService,
        protected GalleryService $galleryService,
        protected LocationHighlightService $locationHighlightService
    ) {
        parent::__construct();
    }

    /**
     * About page
     */
    public function index()
    {
        $property = $this->propertyService->findByCondition([['publish', '=', 2]], false);
        $agents = $this->agentService->findByCondition([['publish', '=', 2]], true);
        $facilities = $this->facilityService->findByCondition([['publish', '=', 2]], true, [], ['id', 'desc']);
        $floorplans = $this->floorplanService->findByCondition([['publish', '=', 2]], true, ['rooms'], ['floor_number', 'asc']);
        $locationHighlights = $this->locationHighlightService->findByCondition([['publish', '=', 2]], true, [], ['id', 'desc']);
        $galleries = $this->galleryService->findByCondition([['publish', '=', 2]], true, [], ['id', 'desc']);
        $primaryAgent = $this->agentService->findByCondition([['is_primary', '=', true], ['publish', '=', 2]], false);

        $system = $this->system;
        $seo = $this->buildSeo('Về Chúng Tôi — Homely Vietnam');
        $schema = $this->schema($seo);
        $config = $this->config();

        return view('frontend.about.index', compact(
            'config',
            'seo',
            'system',
            'schema',
            'property',
            'agents',
            'facilities',
            'floorplans',
            'locationHighlights',
            'galleries',
            'primaryAgent',
        ));
    }

    // ------ Helpers ------

    private function buildSeo($title = null)
    {
        return [
            'meta_title' => $title ?? ($this->system['seo_meta_title'] ?? 'Homely Vietnam'),
            'meta_keyword' => $this->system['seo_meta_keyword'] ?? '',
            'meta_description' => $this->system['seo_meta_description'] ?? '',
            'meta_image' => $this->system['seo_meta_images'] ?? '',
            'canonical' => config('app.url'),
        ];
    }

    public function schema(array $seo = []): string
    {
        return "<script type='application/ld+json'>
            {
                \"@context\": \"https://schema.org\",
                \"@type\": \"WebSite\",
                \"name\": \"" . ($seo['meta_title'] ?? '') . "\",
                \"url\": \"" . ($seo['canonical'] ?? '') . "\",
                \"description\": \"" . ($seo['meta_description'] ?? '') . "\"
            }
        </script>";
    }

    private function config()
    {
        return [
            'language' => $this->language,
            'css' => [],
            'js' => []
        ];
    }
}
