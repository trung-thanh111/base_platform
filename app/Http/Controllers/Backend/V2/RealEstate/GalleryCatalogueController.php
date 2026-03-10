<?php

namespace App\Http\Controllers\Backend\V2\RealEstate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RealEstate\GalleryCatalogue\StoreRequest;
use App\Http\Requests\RealEstate\GalleryCatalogue\UpdateRequest;
use App\Services\V2\Impl\RealEstate\GalleryCatalogueService;
use App\Models\Language;

class GalleryCatalogueController extends Controller
{

    private $service;

    protected $language;

    public function __construct(
        GalleryCatalogueService $service
    ) {
        $this->service = $service;
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
        $galleryCatalogues = $this->service->pagination($request);
        $config = [
            ...$this->config(),
            'extendJs' => true
        ];
        $template = 'backend.gallery.catalogue.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'galleryCatalogues'
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
        $dropdown = [0 => 'Chọn danh mục cha'];
        $template = 'backend.gallery.catalogue.store';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'dropdown'
        ));
    }

    public function edit($id)
    {
        $this->authorize('modules', 'gallery.update');
        if (!$galleryCatalogue = $this->service->findById($id)) {
            return redirect()->route('gallery_catalogue.index')->with('error', 'Bản ghi không tồn tại');
        }
        $config = [
            ...$this->config(),
            'method' => 'update',
            'extendJs' => true
        ];
        $dropdown = [0 => 'Chọn danh mục cha'];
        $template = 'backend.gallery.catalogue.store';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'dropdown',
            'galleryCatalogue'
        ));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('modules', 'gallery.create');
        if ($galleryCatalogue = $this->service->save($request, 'store')) {
            if ($request->input('send') == 'send_and_stay') {
                return redirect()->back()->with('success', 'Thêm mới bản ghi thành công');
            }
            return redirect()->route('gallery_catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
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
            return redirect()->route('gallery_catalogue.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'gallery.destroy');
        if (!$galleryCatalogue = $this->service->findById($id)) {
            return redirect()->route('gallery_catalogue.index')->with('error', 'Bản ghi không tồn tại');
        }
        $config = [
            ...$this->config(),
            'method' => 'update'
        ];
        $template = 'backend.gallery.catalogue.delete';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'galleryCatalogue'
        ));
    }

    public function destroy($id, Request $request)
    {
        $this->authorize('modules', 'gallery.destroy');
        $response = $this->service->destroy($id);
        return $this->handleActionResponse($response, $request, message: 'Xóa bản ghi thành công', redirectRoute: 'gallery_catalogue.index');
    }

    private function config(): array
    {
        return $config = [
            'model' => 'GalleryCatalogue',
            'seo' => $this->seo()
        ];
    }

    private function seo()
    {
        return [
            'index' => [
                'title' => 'Quản lý Loại Thư Viện',
                'table' => 'Danh sách Loại Thư Viện'
            ],
            'create' => [
                'title' => 'Thêm mới Loại Thư Viện'
            ],
            'update' => [
                'title' => 'Cập nhật Loại Thư Viện'
            ],
            'delete' => [
                'title' => 'Xóa Loại Thư Viện'
            ]
        ];
    }
}
