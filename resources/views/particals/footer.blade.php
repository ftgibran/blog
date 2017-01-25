<footer id="footer" class="footer">
    <div class="container text-center">
        <div class="row content">
            <div class="col-md-4 col-md-offset-4">
                <ul class="connect">
                    <li>
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/clash-of-nerds-white-logo.png') }}" class="responsive-img"
                                 alt="Clash Of Nerds" style="width: 200px">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copy-right text-center">
        <span>{!! config('blog.footer.meta') !!}</a>
             |
            <a href="/login">Login</a>
        </span>
    </div>
</footer>