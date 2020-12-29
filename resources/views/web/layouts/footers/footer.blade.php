<div class="footer-row row">
    <div class="col text-center text-lg-left mb-3 mb-lg-0">
        <div class="d-table w-100 h-100">
            <div class="d-table-cell align-middle">
                <ul class="list-inline mb-0">
                @foreach($social_media as $link)
                    <li class="list-inline-item mr-lg-4"><a target="_blank" class="w-inline-block social-icon $link->type" href="{{$link->value}}"><i class="{{$link->class}}"></i></a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col text-right copyright-text">
        <div class="d-table w-100 h-100">
            <div class="d-table-cell align-middle">
                <div>ALL RIGHTS RESERVED.</div>
            </div>
        </div>    
    </div>
</div>
