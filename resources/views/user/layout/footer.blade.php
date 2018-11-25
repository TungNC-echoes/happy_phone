<div class="footer">
    <div class="container">
        <div class="footer-logo">
            <center class="logo">
                <a href="#">
                    <img src="{{ $logo->url }}" alt="{{ $logo->alt }}" class="logo">
                </a>
            </center>
        </div>
        <div class="about">
            <center>
                {{ $about->content }} <br>
                {{ $root_from->title }}: {{ $root_from->url }} <br>
                {{ $fanpage->title }}: {{ $fanpage->url }} <br>
                <p class="contact">
                    Liên hệ chúng tôi: <span class="email">{{ $contact->content }}</span>
                </p>
            </center>
        </div>
    </div>
</div>