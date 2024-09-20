<!-- section footer start -->
<div class="section_footer">
        
    </div>
    </div>
    <!-- section footer end -->
    <div class="copyright">2019 All Rights Reserved. <a href="https://html.design">Free html Templates</a></div>


    <!-- Javascript files-->
    <script src="../Assets/Template/Main/js/jquery.min.js"></script>
    <script src="../Assets/Template/Main/js/popper.min.js"></script>
    <script src="../Assets/Template/Main/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery-3.0.0.min.js"></script>
    <script src="../Assets/Template/Main/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="../Assets/Template/Main/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../Assets/Template/Main/js/custom.js"></script>
    <!-- javascript -->
    <script src="../Assets/Template/Main/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });


            $('#myCarousel').carousel({
                interval: false
            });

            //scroll slides on swipe for touch enabled devices

            $("#myCarousel").on("touchstart", function (event) {

                var yClick = event.originalEvent.touches[0].pageY;
                $(this).one("touchmove", function (event) {

                    var yMove = event.originalEvent.touches[0].pageY;
                    if (Math.floor(yClick - yMove) > 1) {
                        $(".carousel").carousel('next');
                    }
                    else if (Math.floor(yClick - yMove) < -1) {
                        $(".carousel").carousel('prev');
                    }
                });
                $(".carousel").on("touchend", function () {
                    $(this).off("touchmove");
                });
            });
    </script>
</body>

</html>