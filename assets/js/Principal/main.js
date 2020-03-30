 $("#inp_newsletter").submit(function (event) {


     var parametros = {
         "email": document.getElementById("clie_news").value,
         "fecha": document.getElementById("date").value
     }
     $.ajax({
         data: parametros,
         url: '/assets/tools/signin/newsletter.php',
         type: 'post',
         success: function (response) {
             alert(response);
             $('#subscribeModal').modal('hide');
             $('#news').val(response);
             //location.href = "/Cart/";
         }
     });
     event.preventDefault();
 });


 $(window).on('load', function () {
     var news = document.getElementById("news").value;
     if (news != '1') {
         setTimeout(function () {
             $('#subscribeModal').modal('show');
         }, 5000);
     }

 });
 $(document).ready(function () {
     hideall(), slide1();
 });
 $(document).ready(function () {

     $(function () {

         $(document).on('scroll', function () {

             if ($(window).scrollTop() > 100 && $(window).scrollTop() < 3500) {
                 $('.scroll-top-wrapper').addClass('show');
                 //console.log($(window).scrollTop());
             }
             else if ($(window).scrollTop() > 3500) {
                 $('.scroll-top-wrapper').removeClass('show');
             }
             else {
                 $('.scroll-top-wrapper').removeClass('show');
             }
         });
     });

 });

 function hideall() {
     $('#slide1').removeClass(' text-primary');
     $('#slide2').removeClass(' text-primary');
     $('#slide3').removeClass(' text-primary');
     $('#slide1').addClass('text-warning');
     $('#slide2').addClass('text-warning');
     $('#slide3').addClass('text-warning');
 }

 function slide1() {
     $("#carouselExampleIndicators2").carousel();
     $("#carouselExampleIndicators2").carousel(0);
     hideall();
     $('#slide1').removeClass('text-warning ');
     $('#slide1').addClass('text-primary');

 }

 function slide2() {
     $("#carouselExampleIndicators2").carousel();
     $("#carouselExampleIndicators2").carousel(1);
     hideall();
     $('#slide2').removeClass('text-warning ');
     $('#slide2').addClass('text-primary');
 }

 function slide3() {
     $("#carouselExampleIndicators2").carousel();
     $("#carouselExampleIndicators2").carousel(2);
     hideall();
     $('#slide3').removeClass('text-warning ');
     $('#slide3').addClass('text-primary');
 }
