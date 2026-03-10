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
        @if (isset($galleryCatalogues) && is_object($galleryCatalogues))
            @foreach ($galleryCatalogues as $galleryCatalogue)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $galleryCatalogue->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <div class="uk-flex uk-flex-middle">
                            <div class="main-info">
                                <div class="name">{{ $galleryCatalogue->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="sort">
                        <input type="text" name="order" value="{{ $galleryCatalogue->order }}"
                            class="form-control sort-order text-right" data-id="{{ $galleryCatalogue->id }}"
                            data-model="{{ $config['model'] }}">
                    </td>
                    <td class="text-center js-switch-{{ $galleryCatalogue->id }}">
                        <input type="checkbox" value="{{ $galleryCatalogue->publish }}" class="js-switch status "
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $galleryCatalogue->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $galleryCatalogue->id }}" />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('gallery_catalogue.edit', $galleryCatalogue->id) }}"
                            class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('gallery_catalogue.delete', $galleryCatalogue->id) }}"
                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $galleryCatalogues->links('pagination::bootstrap-4') }}
