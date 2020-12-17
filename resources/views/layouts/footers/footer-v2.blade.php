<div class="footer-banner py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-4 text-center">
                <div class="footer-image mx-auto mb-3">
                    <img src="{{ asset('assets/images/phone.svg') }}" alt="phone">
                </div>
                <div class="secondary-color">
                    <p class="footer-column-title">Phone</p>
                    <div class="mb-3">
                        <div>Lebanon:</div>
                        <a href="tel:009613016010">+961 3 016 010 /</a>
                        <a href="tel:009613127952">+961 3 127 952</a>
                    </div>
                    <div class="mb-3">
                        <div>Qatar:</div>
                        <a href="tel:0097444196719">+974.44196719</a>
                    </div>
                    <div>
                        <div class="mb-0">France:</div>
                        <a href="tel:0033658101010">+33 6 58101010</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="footer-image d-block mx-auto mb-3">
                    <img src="{{ asset('assets/images/address.svg') }}" alt="address">
                </div>
                <p class="footer-column-title">Address</p>
                <div class="secondary-color">
                    <div class="mb-3">
                        <div>Beirut - Lebanon</div>
                        <a href="">Horsh Tabet - Qubic - 7th Floor</a>
                    </div>
                    <div class="mb-3">
                        <div>Doha - Qatar</div>
                        <a href="">Al Rawabi Street, Concord Building, Second Floor, office no. 4</a>
                    </div>
                    <div class="mb-3">
                        <div>Paris - France</div>
                        <a href="">66 Avenue de Champs Elysée, 75008, Paris</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="footer-image d-block mx-auto mb-3">
                    <img src="{{ asset('assets/images/email.svg') }}" alt="email">
                </div>
                <p class="footer-column-title">E-mail</p>
                <div class="secondary-color">
                    <div class="mb-3">
                        <div>Lebanon:</div>
                        <a href="mailto:info@dadaarchitecture.com">info@dadaarchitecture.com</a>
                        <a href="mailto:dany@dadaarchitecture.com">dany@dadaarchitecture.com</a>
                    </div>
                    <div class="mb-3">
                        <div>Qatar:</div>
                        <a href="mailto:info@dadaarchitecture.com">info@dadaarchitecture.com</a>
                    </div>
                    <div class="mb-3">
                        <div>France:</div>
                        <a href="mailto:dany@dadaarchitecture.com">dany@dadaarchitecture.com</a>
                    </div>
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