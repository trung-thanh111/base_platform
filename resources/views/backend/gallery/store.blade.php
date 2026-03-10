@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo'][$config['method']]['title']])
@include('backend.dashboard.component.formError')
@php
    $url = $config['method'] == 'create' ? route('gallery.store') : route('gallery.update', $gallery->id ?? 0);
@endphp
<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-9">
                @include('backend.dashboard.component.album', ['model' => $gallery ?? null])
            </div>

            <div class="col-lg-3">
                <div class="ibox w">
                    <div class="ibox-title">
                        <h5>{{ __('messages.tableHeading') }}</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <select name="property_id" class="form-control setupSelect2">
                                        <option value="">[Chọn Bất động sản]</option>
                                        @foreach ($properties as $property)
                                            <option
                                                {{ $property->id == old('property_id', isset($gallery->property_id) ? $gallery->property_id : '') ? 'selected' : '' }}
                                                value="{{ $property->id }}">{{ $property->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row mt15">
                                    <label class="control-label text-left">Loại thư viện</label>
                                    <select name="gallery_catalogue_id" class="form-control setupSelect2">
                                        <option value="">[Chọn loại thư viện]</option>
                                        @foreach ($galleryCatalogues as $cat)
                                            <option
                                                {{ $cat->id == old('gallery_catalogue_id', isset($gallery->gallery_catalogue_id) ? $gallery->gallery_catalogue_id : '') ? 'selected' : '' }}
                                                value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('backend.dashboard.component.publish', [
                    'model' => $gallery ?? null,
                    'hideImage' => true,
                ])
            </div>
        </div>
        <div class="text-right mb15 fixed-bottom">
            <button class="btn btn-primary" type="submit" name="send"
                value="send_and_stay">{{ __('messages.save') }}</button>
            <button class="btn btn-success" type="submit" name="send" value="send_and_exit">Đóng</button>
        </div>
    </div>
</form>
