<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:50px;">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>{{ __('messages.tableName') }}</th>
            <th class="text-right">Sắp xếp</th>
            <th class="text-center" style="width:100px;">{{ __('messages.tableStatus') }}</th>
            <th class="text-center" style="width:100px;">{{ __('messages.tableAction') }}</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($galleries) && is_object($galleries))
            @foreach ($galleries as $gallery)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $gallery->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <div class="uk-flex uk-flex-middle">
                            @php
                                $image =
                                    is_array($gallery->album) && count($gallery->album) > 0
                                        ? $gallery->album[0]
                                        : 'backend/img/img-not-found.jpg';
                            @endphp
                            <div class="image mr15">
                                <span class="img-cover"><img src="{{ asset($image) }}" alt=""
                                        style="width:100px;height:60px;object-fit:cover;border-radius:4px;"></span>
                            </div>
                            <div class="main-info">
                                <div class="name">{{ $gallery->name }}</div>
                                <div class="sub-info">Bất động sản: {{ $gallery->properties->title ?? 'N/A' }}</div>
                                <div class="sub-info">Loại: {{ $gallery->gallery_catalogues->name ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="sort">
                        <input type="text" name="order" value="{{ $gallery->order }}"
                            class="form-control sort-order text-right" data-id="{{ $gallery->id }}"
                            data-model="{{ $config['model'] }}">
                    </td>
                    <td class="text-center js-switch-{{ $gallery->id }}">
                        <input type="checkbox" value="{{ $gallery->publish }}" class="js-switch status "
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $gallery->publish == 2 ? 'checked' : '' }} data-modelId="{{ $gallery->id }}" />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('gallery.delete', $gallery->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $galleries->links('pagination::bootstrap-4') }}
