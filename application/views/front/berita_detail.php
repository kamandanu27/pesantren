

<div class="breadcumb-area black-opacity bg-img-5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcumb-wrap">
                    <h2><?= $halaman ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="<?= base_url(); ?>">Beranda</a></li>
                        <li>/</li>
                        <li><a href="<?= base_url(); ?>berita"><?= $halaman ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    
<section class="blog-area">
    <div class="container" style="padding: 30px 20px 20px;">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 wow fadeInUp" style="margin-top: 20px; padding: 25px;">
                <div class="blog-details-wrap">
                    <div class="blog-details-content">
                        <h2 style="color: black; font-weight: 700;"><?= $data_detail['blog_judul'] ?></h2>
                        <span style="color: black;">Diterbitkan: <?= format_indo($data_detail['publish_date']) ?></span>
                        <span style="color: black;">- Penulis : <?= $data_detail['name_user'] ?></span>
                    </div>
                    <div class="blog-details-img mt-20">
                    <script data-cfasync="false" src="https://preview.colorlib.com/theme/martxa/martxa/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
                    </script>
                    <script data-pagespeed-no-defer>//<![CDATA[
                        (function(){for(var g="function"==typeof Object.defineProperties?Object.defineProperty:function(b,c,a){if(a.get||a.set)throw new TypeError("ES3 does not support getters and setters.");b!=Array.prototype&&b!=Object.prototype&&(b[c]=a.value)},h="undefined"!=typeof window&&window===this?this:"undefined"!=typeof global&&null!=global?global:this,k=["String","prototype","repeat"],l=0;l<k.length-1;l++){var m=k[l];m in h||(h[m]={});h=h[m]}
                        var n=k[k.length-1],p=h[n],q=p?p:function(b){var c;if(null==this)throw new TypeError("The 'this' value for String.prototype.repeat must not be null or undefined");c=this+"";if(0>b||1342177279<b)throw new RangeError("Invalid count value");b|=0;for(var a="";b;)if(b&1&&(a+=c),b>>>=1)c+=c;return a};q!=p&&null!=q&&g(h,n,{configurable:!0,writable:!0,value:q});var t=this;
                        function u(b,c){var a=b.split("."),d=t;a[0]in d||!d.execScript||d.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===c?d[e]?d=d[e]:d=d[e]={}:d[e]=c};function v(b){var c=b.length;if(0<c){for(var a=Array(c),d=0;d<c;d++)a[d]=b[d];return a}return[]};function w(b){var c=window;if(c.addEventListener)c.addEventListener("load",b,!1);else if(c.attachEvent)c.attachEvent("onload",b);else{var a=c.onload;c.onload=function(){b.call(this);a&&a.call(this)}}};var x;function y(b,c,a,d,e){this.h=b;this.j=c;this.l=a;this.f=e;this.g={height:window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,width:window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth};this.i=d;this.b={};this.a=[];this.c={}}
                        function z(b,c){var a,d,e=c.getAttribute("data-pagespeed-url-hash");if(a=e&&!(e in b.c))if(0>=c.offsetWidth&&0>=c.offsetHeight)a=!1;else{d=c.getBoundingClientRect();var f=document.body;a=d.top+("pageYOffset"in window?window.pageYOffset:(document.documentElement||f.parentNode||f).scrollTop);d=d.left+("pageXOffset"in window?window.pageXOffset:(document.documentElement||f.parentNode||f).scrollLeft);f=a.toString()+","+d;b.b.hasOwnProperty(f)?a=!1:(b.b[f]=!0,a=a<=b.g.height&&d<=b.g.width)}a&&(b.a.push(e),
                        b.c[e]=!0)}y.prototype.checkImageForCriticality=function(b){b.getBoundingClientRect&&z(this,b)};u("pagespeed.CriticalImages.checkImageForCriticality",function(b){x.checkImageForCriticality(b)});u("pagespeed.CriticalImages.checkCriticalImages",function(){A(x)});
                        function A(b){b.b={};for(var c=["IMG","INPUT"],a=[],d=0;d<c.length;++d)a=a.concat(v(document.getElementsByTagName(c[d])));if(a.length&&a[0].getBoundingClientRect){for(d=0;c=a[d];++d)z(b,c);a="oh="+b.l;b.f&&(a+="&n="+b.f);if(c=!!b.a.length)for(a+="&ci="+encodeURIComponent(b.a[0]),d=1;d<b.a.length;++d){var e=","+encodeURIComponent(b.a[d]);131072>=a.length+e.length&&(a+=e)}b.i&&(e="&rd="+encodeURIComponent(JSON.stringify(B())),131072>=a.length+e.length&&(a+=e),c=!0);C=a;if(c){d=b.h;b=b.j;var f;if(window.XMLHttpRequest)f=
                        new XMLHttpRequest;else if(window.ActiveXObject)try{f=new ActiveXObject("Msxml2.XMLHTTP")}catch(r){try{f=new ActiveXObject("Microsoft.XMLHTTP")}catch(D){}}f&&(f.open("POST",d+(-1==d.indexOf("?")?"?":"&")+"url="+encodeURIComponent(b)),f.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),f.send(a))}}}
                        function B(){var b={},c;c=document.getElementsByTagName("IMG");if(!c.length)return{};var a=c[0];if(!("naturalWidth"in a&&"naturalHeight"in a))return{};for(var d=0;a=c[d];++d){var e=a.getAttribute("data-pagespeed-url-hash");e&&(!(e in b)&&0<a.width&&0<a.height&&0<a.naturalWidth&&0<a.naturalHeight||e in b&&a.width>=b[e].o&&a.height>=b[e].m)&&(b[e]={rw:a.width,rh:a.height,ow:a.naturalWidth,oh:a.naturalHeight})}return b}var C="";u("pagespeed.CriticalImages.getBeaconData",function(){return C});
                        u("pagespeed.CriticalImages.Run",function(b,c,a,d,e,f){var r=new y(b,c,a,e,f);x=r;d&&w(function(){window.setTimeout(function(){A(r)},0)})});})();

                        pagespeed.CriticalImages.Run('/mod_pagespeed_beacon','https://preview.colorlib.com/theme/martxa/martxa/blog-post.html','-ilGEe-FWC',true,false,'LetlEgamUnQ');
                        //]]>
                    </script>
                        <img src="<?= base_url();?>public/image/upload/berita/<?= $data_detail['blog_gambar'] ?>" alt="" data-pagespeed-url-hash="2374471477" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </div>
                    <div class="blog-details-content" id="blogdetail">
                        <?= $data_detail['blog_isi'] ?>

                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; text-align: right;">
                            <div id='share-button'> <p>Share : </p>
                                <!-- untuk tombol Whatsapp -->
                                <a href="https://api.whatsapp.com/send?text=<?= $data_detail['blog_judul'] ?>%20<?= base_url()?>berita/<?= $data_detail['blog_slug'] ?>" style="background:#4dc247;" target="_blank" title="Whatsapp"><svg viewBox="0 0 24 24"><path d="M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z"/></svg></a>

                                <!-- untuk tombol Facbook -->
                                <a href="http://www.facebook.com/sharer.php?u=<?= base_url()?>berita/<?= $data_detail['blog_slug'] ?>" itemprop="sameAs" style="background:#3b5998;" target="_blank" title="Facebook"><svg viewBox="0 0 24 24"><path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z"/></svg></a>

                                <!-- untuk tobol Twitter -->
                                <a href="https://twitter.com/intent/tweet?text=<?= $data_detail['blog_judul'] ?>&url=<?= base_url()?>berita/<?= $data_detail['blog_slug'] ?>" rel="nofollow" style="background:#4099ff;" target="_blank" title="Twitter"><svg viewBox="0 0 24 24"> <path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"/></svg></a>

                                <!-- untuk tombol Linkedin -->
                                <a href="" rel="nofollow" style="background:#2554BF;" target="_blank" title="Linkedin"><svg viewBox="0 0 24 24"><path d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z"/></svg></a>

                                <!-- untuk tombol Telegram -->
                                <a href="https://telegram.me/share/url?url=<?= base_url()?>berita/<?= $data_detail['blog_slug'] ?>&text=<?= $data_detail['blog_judul'] ?>" rel="nofollow" style="background: #32afed;" target="_blank" title="Share to Telegram"><svg viewBox="0 0 24 24"><path d="M9.78,18.65L10.06,14.42L17.74,7.5C18.08,7.19 17.67,7.04 17.22,7.31L7.74,13.3L3.64,12C2.76,11.75 2.75,11.14 3.84,10.7L19.81,4.54C20.54,4.21 21.24,4.72 20.96,5.84L18.24,18.65C18.05,19.56 17.5,19.78 16.74,19.36L12.6,16.3L10.61,18.23C10.38,18.46 10.19,18.65 9.78,18.65Z.083 -0.219,-0.037c-2.5,1.596 -6.939,4.43 -6.939,4.43Z"/></svg></a>

                            </div>
                        </div>
                      
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12  col-xs-12 wow fadeInUp" style="margin-top: 20px; padding: 25px;">
                <div class="search-sidebar mb-30">
                    <form action="#">
                    <input type="text" name="search" placeholder="Cari disini">
                    <button type="button" name="button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="related-post mb-30">
                    <h3 class="sidebar-title">Berita Populer</h3>
                    <ul>
                    <?php $no=1; foreach($data_populer as $row_populer){?>
                        <li class="related-post-items">
                            <div class="post-img">
                                <img src="<?= base_url(); ?>public/image/upload/berita/<?= $row_populer->blog_gambar ?>" alt="" style="width: 75px; height: 75px;">
                            </div>
                            <div class="post-info">
                                <a class="judul" href="<?= base_url()?>berita/<?= $row_populer->blog_slug ?>" ><?= character_limiter($row_populer->blog_judul,50) ?></a>
                                <p><?= format_indo($row_populer->publish_date); ?></p>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>

                <div class="related-post mb-30">
                    <h3 class="sidebar-title">Artikel Terbaru</h3>
                    <ul>
                    <?php $no=1; foreach($data_terbaru as $row_terbaru){?>
                        <li class="related-post-items">
                            <div class="post-img">
                                <img src="<?= base_url(); ?>public/image/upload/artikel/<?= $row_terbaru->blog_gambar ?>" alt="" style="width: 75px; height: 75px;">
                            </div>
                            <div class="post-info">
                                <a class="judul" href="<?= base_url()?>artikel/<?= $row_terbaru->blog_slug ?>" ><?= character_limiter($row_terbaru->blog_judul,50) ?></a>
                                <p><?= format_indo($row_terbaru->publish_date); ?></p>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

