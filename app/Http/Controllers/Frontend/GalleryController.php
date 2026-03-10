<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use App\Services\V2\Impl\RealEstate\FloorplanService;
use App\Services\V2\Impl\RealEstate\GalleryService;
use App\Services\V2\Impl\RealEstate\PropertyService;
use App\Services\V2\Impl\RealEstate\GalleryCatalogueService;
use Illuminate\Http\Request;

class GalleryController extends FrontendController
{
    public function __construct(
        protected GalleryService $galleryService,
        protected FloorplanService $floorplanService,
        protected PropertyService $propertyService,
        protected GalleryCatalogueService $galleryCatalogueService
    ) {
        parent::__construct();
    }

    /**
     * Gallery page
     */
    public function index()
    {
        $galleries = $this->galleryService->findByCondition([['publish', '=', 2]], true, ['gallery_catalogues'], ['id', 'desc']);
        $galleryCatalogues = $this->galleryCatalogueService->findByCondition([['publish', '=', 2]], true, ['galleries'], ['order', 'asc']);
        $floorplans = $this->floorplanService->findByCondition([['publish', '=', 2]], true, ['rooms'], ['floor_number', 'asc']);
        $property = $this->propertyService->findByCondition([['publish', '=', 2]], false);

        $system = $this->system;
        $seo = $this->buildSeo('Thư Viện Ảnh — Homely Vietnam');
        $schema = $this->schema($seo);
        $config = $this->config();

        return view('frontend.gallery.index', compact(
            'config',
            'seo',
            'system',
            'schema',
            'galleries',
            'galleryCatalogues',
            'floorplans',
            'property'
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
