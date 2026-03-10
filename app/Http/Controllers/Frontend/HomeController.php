<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use App\Services\V2\Impl\RealEstate\PropertyService;
use App\Services\V2\Impl\RealEstate\PropertyFacilityService;
use App\Services\V2\Impl\RealEstate\FloorplanService;
use App\Services\V2\Impl\RealEstate\GalleryService;
use App\Services\V2\Impl\RealEstate\LocationHighlightService;
use App\Services\V2\Impl\RealEstate\AgentService;
use App\Services\V1\Core\SlideService;
use App\Repositories\Core\SystemRepository;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    protected $systemRepository;

    public function __construct(
        SystemRepository $systemRepository,
        protected PropertyService $propertyService,
        protected PropertyFacilityService $facilityService,
        protected FloorplanService $floorplanService,
        protected GalleryService $galleryService,
        protected LocationHighlightService $locationHighlightService,
        protected AgentService $agentService,
        protected SlideService $slideService
    ) {
        $this->systemRepository = $systemRepository;
        parent::__construct();
    }

    /**
     * Homepage — 9 sections
     */
    public function index()
    {
        $property = $this->propertyService->findByCondition([['publish', '=', 2]], false);
        $facilities = $this->facilityService->findByCondition([['publish', '=', 2]], true, [], ['sort_order', 'asc']);
        $floorplans = $this->floorplanService->findByCondition([['publish', '=', 2]], true, ['rooms'], ['floor_number', 'asc']);
        $galleries = $this->galleryService->findByCondition([['publish', '=', 2]], true, [], ['id', 'desc']);
        $locationHighlights = $this->locationHighlightService->findByCondition([['publish', '=', 2]], true, [], ['sort_order', 'asc']);

        $primaryAgent = $this->agentService->findByCondition([['is_primary', '=', true], ['publish', '=', 2]], false);
        $agents = $this->agentService->findByCondition([['publish', '=', 2]], true);

        $slides = $this->slideService->findByCondition([['keyword', '=', 'main-slider'], ['publish', '=', 2]], false);

        $system = $this->system;
        $seo = $this->buildSeo();
        $schema = $this->schema($seo);
        $config = $this->config();

        $template = 'frontend.homepage.home.index';
        return view($template, compact(
            'config',
            'seo',
            'system',
            'schema',
            'property',
            'facilities',
            'floorplans',
            'galleries',
            'locationHighlights',
            'primaryAgent',
            'agents',
            'slides',
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
