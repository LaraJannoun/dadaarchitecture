<div class="footer-banner py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-4 text-center">
                <div class="footer-image mx-auto mb-3">
                    <img src="{{ asset('assets_web/images/phone.svg') }}" alt="phone">
                </div>
                <div class="secondary-color">
                    <p class="footer-column-title">Phone</p>
                    @foreach($phone_details as $phone_detail)
                    <div class="mb-3 d-grid">
                        <div>{{$phone_detail->country}}</div>
                        @php
                        $values = explode('/', $phone_detail->value);
                        $links = explode('/', $phone_detail->link);
                        @endphp
                        @foreach($values as $key => $value)
                        <a href="tel:{{$links[$key]}}">{{$value}}</a>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="footer-image d-block mx-auto mb-3">
                    <img src="{{ asset('assets_web/images/address.svg') }}" alt="address">
                </div>
                <p class="footer-column-title">Address</p>
                <div class="secondary-color">
                    @foreach($address_details as $address_detail)
                    <div class="mb-3 d-grid">
                        <div>{{$address_detail->country}}</div>
                        @php
                        $values = explode('/', $address_detail->value);
                        $links = explode('/', $address_detail->link);
                        @endphp

                        @foreach($values as $key => $value)
                        <a href="{{$links[$key]}}">{{$value}}</a>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="footer-image d-block mx-auto mb-3">
                    <img src="{{ asset('assets_web/images/email.svg') }}" alt="email">
                </div>
                <p class="footer-column-title">E-mail</p>
                <div class="secondary-color">
                    @foreach($email_details as $email_detail)
                    <div class="mb-3 d-grid">
                        <div>{{$email_detail->country}}</div>
                        @php
                        $values = explode('/', $email_detail->value);
                        $links = explode('/', $email_detail->link);
                        @endphp
                        @foreach($values as $key => $value)
                        <a href="mailto:{{$links[$key]}}">{{$value}}</a>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if(!Route::is('home'))
        <div class="move-to-top float-right">
            <i class="fa fa-angle-up"></i>
        </div>
        @endif
    </div>
</div>