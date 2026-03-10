<?php

namespace App\Http\Controllers\Backend\V2\RealEstate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RealEstate\Gallery\StoreRequest;
use App\Http\Requests\RealEstate\Gallery\UpdateRequest;
use App\Services\V2\Impl\RealEstate\GalleryService;
use App\Services\V2\Impl\RealEstate\PropertyService;
use App\Services\V2\Impl\RealEstate\GalleryCatalogueService;
use App\Models\Language;

class GalleryController extends Controller
{

    private $service;
    private $propertyService;
    private $galleryCatalogueService;

    protected $language;

    public function __construct(
        GalleryService $service,
        PropertyService $propertyService,
        GalleryCatalogueService $galleryCatalogueService
    ) {
        $this->service = $service;
        $this->propertyService = $propertyService;
        $this->galleryCatalogueService = $galleryCatalogueService;
        $this->middleware(function ($request, $next) {
            $locale = app()->getLocale();
            $language = Language::where('canonical', $locale)->first();
            $this->language = $language->id;
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'gallery.index');
        $galleries = $this->service->pagination($request);
        $config = [
            ...$this->config(),
            'extendJs' => true
        ];
        $template = 'backend.gallery.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'galleries'
        ));
    }

    public function create()
    {
        $this->authorize('modules', 'gallery.create');
        $config = [
            ...$this->config(),
            'method' => 'create',
            'extendJs' => true
        ];
        $properties = $this->propertyService->all();
        $galleryCatalogues = $this->galleryCatalogueService->all();
        $template = 'backend.gallery.store';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'properties',
            'galleryCatalogues'
        ));
    }

    public function edit($id)
    {
        $this->authorize('modules', 'gallery.update');
        if (!$gallery = $this->service->findById($id)) {
            return redirect()->route('gallery.index')->with('error', 'Bản ghi không tồn tại');
        }
        $config = [
            ...$this->config(),
            'method' => 'update',
            'extendJs' => true
        ];
        $properties = $this->propertyService->all();
        $galleryCatalogues = $this->galleryCatalogueService->all();
        $template = 'backend.gallery.store';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'gallery',
            'properties',
            'galleryCatalogues'
        ));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('modules', 'gallery.create');
        if ($gallery = $this->service->save($request, 'store')) {
            if ($request->input('send') == 'send_and_stay') {
                return redirect()->back()->with('success', 'Thêm mới bản ghi thành công');
            }
            return redirect()->route('gallery.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->back()->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function update($id, UpdateRequest $request)
    {
        $this->authorize('modules', 'gallery.update');
        if ($this->service->save($request, 'update', $id)) {
            if ($request->input('send') == 'send_and_stay') {
                return redirect()->back()->with('success', 'Cập nhật bản ghi thành công');
            }
            return redirect()->route('gallery.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'gallery.destroy');
        if (!$gallery = $this->service->findById($id)) {
            return redirect()->route('gallery.index')->with('error', 'Bản ghi không tồn tại');
        }
        $config = [
            ...$this->config(),
            'method' => 'update'
        ];
        $template = 'backend.gallery.delete';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'gallery'
        ));
    }

    public function destroy($id, Request $request)
    {
        $this->authorize('modules', 'gallery.destroy');
        $response = $this->service->destroy($id);
        return $this->handleActionResponse($response, $request, message: 'Xóa bản ghi thành công', redirectRoute: 'gallery.index');
    }

    private function config(): array
    {
        return $config = [
            'model' => 'Gallery',
            'seo' => $this->seo()
        ];
    }

    private function seo()
    {
        return [
            'index' => [
                'title' => 'Quản lý Thư Viện Ảnh',
                'table' => 'Danh sách Thư Viện Ảnh'
            ],
            'create' => [
                'title' => 'Thêm mới Thư Viện Ảnh'
            ],
            'update' => [
                'title' => 'Cập nhật Thư Viện Ảnh'
            ],
            'delete' => [
                'title' => 'Xóa Thư Viện Ảnh'
            ]
        ];
    }
}
