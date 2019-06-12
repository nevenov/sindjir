<div class="footer">
    <div class="container">
        <ul class="list-unstyled list-inline contact">
            <li class="phone">{{ trans('site.contact_us') }}: <br class="hidden-md hidden-lg" /><br class="hidden-md hidden-lg" /><span></span>0890 20 27 27</li>
            <li class="email"><span></span><email id="emailFooter"></email></li>
            <li class="facebook"><span></span>
                <a href="https://www.facebook.com/sinjirite/" style="color: #ece7d4;" target="_blank">facebook.com/sinjirite</a>
            </li>
        </ul>
        <hr>
        <div class="row">
            <div class="col-md-10 hidden-xs hidden-sm">
                <nav id="navFooter" class="navbar navbar-inverse">
                    @include('partials.navigation')
                </nav>
            </div>
            <div class="col-md-2 text-right">&copy; 2015 Sinjirite.bg</div>
        </div>
    </div>
</div>

<script>
    var parts = ["contact", "sinjirite", "bg", "&#46;", "&#64;"];
    var email = parts[0] + parts[4] + parts[1] + parts[3] + parts[2];
    document.getElementById("emailFooter").innerHTML=email;
</script>