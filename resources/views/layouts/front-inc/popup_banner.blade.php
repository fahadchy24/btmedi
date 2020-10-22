<div class="model-popup">
    <div id="container-module-newletter" class="hidden-md hidden-sm hidden-xs">
        <div class="so_newletter_custom_popup_bg popup_bg"></div>
        <div class="module main-newsleter-popup so_newletter_custom_popup so_newletter_oca_popup" id="so_newletter_custom_popup">
            <div class="so-custom-popup so-custom-oca-popup" style="width: 850px; background: url({{ url('uploads/frontend/image/popup-banner/'.$popup_banner->popup_banner) }}) no-repeat white;">
                <div class="modcontent">
                    <div class="oca_popup" id="test-popup">
                        <div class="popup-content">
                            <p class="newsletter_promo">Daily Promotion</p>
                            <div class="popup-title">SIGN UP FOR NEWSLETTER </div>
                            <form method="post" action="{{ route('subscribe.submit') }}" class="form-group signup">@csrf
                                <div class="input-control">
                                    <div class="email"> <input type="email" placeholder="Your email address..." value="" class="form-control" id="email" name="email" required>
                                </div>
                                @error('email')
                                    <p class="ml-4 text-danger-none">This email has been subscribed already.</p>
                                @enderror
                                    <button class="btn btn-default" type="submit">Subscribe </button>
                                </div>
                            </form>
                            {{-- <label class="hidden-popup"> <input type="checkbox" value="1" name="hidden-popup"> <span class="inline">&nbsp;&nbsp;Don't show this popup again</span> </label> --}}
                        </div>
                    </div>
                </div>
                <button title="Close" type="button" class="popup-close">×</button>
            </div>
        </div>
    </div>
</div>
