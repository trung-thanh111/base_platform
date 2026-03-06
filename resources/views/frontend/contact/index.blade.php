@extends('frontend.homepage.layout')
@section('content')
    <section class="homely-schedule-section">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-flex-middle">
                <div class="uk-width-medium-4-10" data-reveal="left">
                    <div style="padding-right:20px;">
                        <div class="homely-section-label">
                            Liên Hệ
                        </div>
                        <br>
                        <span class="homely-section-desc">
                            Bạn quan tâm đến bất động sản này hoặc sẵn sàng đến xem trực tiếp? Gửi yêu cầu và chúng tôi
                            sẽ sắp xếp buổi tham quan thuận tiện cho bạn.
                        </span>

                        @if (isset($primaryAgent) && $primaryAgent)
                            <div class="homely-agent-info uk-flex uk-flex-middle" style="gap:15px;">
                                @if ($primaryAgent->avatar)
                                    <img src="{{ $primaryAgent->avatar }}"
                                        style="width:70px;height:70px;border-radius:50%;object-fit:cover;"
                                        alt="{{ $primaryAgent->full_name }}">
                                @else
                                    <div class="homely-avatar-fallback"><i class="fa fa-user"></i></div>
                                @endif
                                <div style="text-align: left;">
                                    <div class="agent-label">
                                        {{ $primaryAgent->full_name }}
                                    </div>
                                    <div class="homely-label-green" style="font-size:14px; font-weight:500;">
                                        {{ $primaryAgent->phone }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="homely-agent-info uk-flex uk-flex-middle" style="gap:15px;">
                                <div class="homely-avatar-fallback"><i class="fa fa-user"></i></div>
                                <div style="text-align: left;">
                                    <h5 style="margin:0 0 5px 0; font-weight:600;">Emily Rodriguez</h5>
                                    <div class="homely-label-green" style="font-size:14px; font-weight:500;">(+1)
                                        234-5678</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="uk-width-medium-6-10" data-reveal="right">
                    <form id="visit-request-form" class="homely-schedule-form" method="post" style="padding-left:20px;">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id ?? '' }}">

                        <div class="uk-grid" uk-grid style="--uk-grid-gutter:20px; --uk-grid-gutter-vertical:20px;">
                            <div class="uk-width-1-1 uk-width-medium-1-3 uk-margin-bottom">
                                <input type="text" name="full_name" placeholder="Họ và tên" required
                                    class="homely-input">
                            </div>
                            <div class="uk-width-1-1 uk-width-medium-1-3 uk-margin-bottom">
                                <input type="email" name="email" placeholder="Email" class="homely-input">
                            </div>
                            <div class="uk-width-1-1 uk-width-medium-1-3 uk-margin-bottom">
                                <input type="text" name="phone" placeholder="Số điện thoại" required
                                    class="homely-input">
                            </div>
                            <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-bottom">
                                <div class="uk-position-relative">
                                    <input type="text" name="preferred_date" placeholder="DD-MM-YYYY"
                                        class="homely-input" style="padding-right:40px;" onfocus="this.type='date'"
                                        onblur="if(!this.value){this.type='text'}">
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-width-medium-1-2">
                                <div class="uk-position-relative">
                                    <select name="time" class="homely-input homely-select" style="padding-right:40px;">
                                        <option value="" disabled selected>10:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                    </select>
                                    <i class="fa fa-angle-down uk-position-absolute"
                                        style="right:15px;top:16px;color:#aebf9e;pointer-events:none;"></i>
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                                <textarea name="message" class="homely-input homely-textarea"
                                    placeholder="Cho chúng tôi biết ngày mong muốn, thời gian, hoặc bất kỳ câu hỏi nào"></textarea>
                            </div>
                            <div class="uk-width-1-1 uk-text-left">
                                <button type="submit" class="homely-btn-submit">
                                    Gửi yêu cầu
                                </button>
                            </div>
                        </div>

                        <div id="visit-form-success"
                            style="display:none;margin-top:20px;padding:20px;background:#f4f7f4;border-radius:8px;text-align:center;">
                            <h4 style="margin-bottom:5px;">Yêu Cầu Tham Quan Đã Được Ghi Nhận!</h4>
                            <p style="color:#6d7b63;margin-bottom:0;">Cảm ơn bạn đã gửi yêu cầu. Đội ngũ của chúng tôi
                                sẽ liên hệ với bạn sớm nhất.</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
