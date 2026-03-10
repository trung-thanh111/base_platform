@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['delete']['title']])
<div class="wrapper wrapper-content animated fadeInRight">

    <form action="{{ route('gallery_catalogue.destroy', $galleryCatalogue->id) }}" method="post" class="box">
        @csrf
        @method('DELETE')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>{{ $config['seo']['delete']['title'] }}</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <p>Bạn đang muốn xóa bản ghi: <strong>{{ $galleryCatalogue->name }}</strong></p>
                                    <p class="text-danger">Lưu ý: Không thể khôi phục bản ghi sau khi xóa. Hãy chắc chắn
                                        bạn muốn thực hiện việc này.</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-danger" type="submit">Xác nhận xóa</button>
                                <a href="{{ route('gallery_catalogue.index') }}" class="btn btn-default">Hủy bỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
