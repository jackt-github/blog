<div class="goTop">
    <a title="回到顶部" ></a>
</div>

<script>
    $(window).scroll( function() {
        if(($(document).scrollTop() >= window.innerHeight)  && window.innerWidth>=800){
            $(".goTop").show();
        }
        else{
            $(".goTop").hide();
        }
    });

    $('.goTop a').click(function (){
        (function smoothscroll(){
            var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
            if (currentScroll > 0) {
                window.requestAnimationFrame(smoothscroll);
                window.scrollTo (0,currentScroll - (currentScroll/5));
            }
        })();
    });

</script>