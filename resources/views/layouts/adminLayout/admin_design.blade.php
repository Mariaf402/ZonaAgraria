
<!DOCTYPE html>
<html lang="en">


<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title')  ZonAgraria</title>
<meta name="csrf-token" content="{{csrf_token()}}">
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <link href="{{asset('admin-assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/plugins/lobipanel/lobipanel.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/plugins/pace/flash.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
      <link href="{{asset('admin-assets/plugins/emojionearea/emojionearea.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/plugins/monthly/monthly.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('admin-assets/dist/css/stylecrm.css')}}" rel="stylesheet" type="text/css"/>

         <link href="{{ asset('admin-assets/dist/img/mini-logo.png') }}" rel="icon">

   </head>
   <body class="hold-transition sidebar-mini">
      <div id="preloader">
            <div id="status"></div>
         </div>
       <div class="wrapper">
       @include('layouts.adminLayout.admin_header')

      @include('layouts.adminLayout.admin_sidebar')

      @yield('content')

      @include('layouts.adminLayout.admin_footer')

       </div>
           <script src="{{ asset('js/backend_js/jquery.min.js') }} "></script>
           <!-- <script src="{{ asset('js/backend_js/jquery.ui.custom.js') }} "></script> -->
           <script src="{{ asset('js/backend_js/bootstrap.min.js') }} "></script>
           <script src="{{ asset('js/backend_js/jquery.uniform.js') }} "></script>
           <script src="{{ asset('js/backend_js/select2.min.js') }} "></script>
           <script src="{{ asset('js/backend_js/jquery.validate.js') }} "></script>
           <script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }} "></script>
           <script src="{{ asset('js/backend_js/matrix.js') }} "></script>
           <script src="{{ asset('js/backend_js/matrix.form_validation.js') }} "></script>
           <script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>
           <script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script>
           <script src="{{ asset('js/backend_js/sweetalert.min.js') }}"></script>
           <script src="{{ asset('js/backend_js/wysihtml5-0.3.0.js') }}"></script>
           <script src="{{ asset('js/backend_js/bootstrap-wysihtml5.js') }}"></script>
           <script>
               $('.textarea_editor').wysihtml5();
               $('.textarea_care').wysihtml5();
           </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- jquery-ui -->
      <script src="{{asset('admin-assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
       minDate:0,
       dateFormat:'yy-mm-dd'
    });
  } );
  </script>
      <!-- Bootstrap -->
      <script src="{{asset('admin-assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="{{asset('admin-assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="{{asset('admin-assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="{{asset('admin-assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="{{asset('admin-assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="{{asset('admin-assets/dist/js/custom.js')}}" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src="{{asset('admin-assets/plugins/chartJs/Chart.min.js')}}" type="text/javascript"></script>
      <!-- Counter js -->
      <script src="{{asset('admin-assets/plugins/counterup/waypoints.js')}}" type="text/javascript"></script>
      <script src="{{asset('admin-assets/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="{{asset('admin-assets/plugins/monthly/monthly.js')}}" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="{{asset('admin-assets/dist/js/dashboard.js')}}" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
         <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

         <script>
         $(document).ready( function () {
         $('#table_id').DataTable({
               "paging":false,

         });
         $(this).closest('td').attr('id');
         //Update Product Status
         $(".ProductStatus").change(function(){
          var id = $(this).attr('rel');
          if($(this).prop("checked")==true){
             $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-product-status',
                data : {status:'1',id:id},
                success:function(data){
                   $("#message_success").show();
                   setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });

          }else{
            $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-product-status',
                data : {status:'0',id:id},
                success:function(resp){
                   $("#message_error").show();
                   setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });
          }
         });
         //Update Coupons Status
         $(".CouponStatus").change(function(){
            var id = $(this).attr('rel');
            if($(this).prop("checked")==true){
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type : 'post',
                  url : '/admin/update-coupon-status',
                  data : {status:'1',id:id},
                  success:function(data){
                     $("#message_success").show();
                     setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                  },error:function(){
                     alert("Error");
                  }
               });

            }else{
              $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type : 'post',
                  url : '/admin/update-coupon-status',
                  data : {status:'0',id:id},
                  success:function(resp){
                     $("#message_error").show();
                     setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                  },error:function(){
                     alert("Error");
                  }
               });
            }
           });
         //Update Product Status
         $(".FeaturedStatus").change(function(){
          var id = $(this).attr('rel');
          if($(this).prop("checked")==true){
             $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-featured-product-status',
                data : {status:'1',id:id},
                success:function(data){
                   $("#message_success").show();
                   setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });

          }else{
            $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-featured-product-status',
                data : {status:'0',id:id},
                success:function(resp){
                   $("#message_error").show();
                   setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });
          }
         });
           //Update Category Status
         $(".CategoryStatus").change(function(){

          var id = $(this).attr('rel');
          if($(this).prop("checked")==true){
             $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-category-status',
                data : {status:'1',id:id},
                success:function(data){
                   $("#message_success").show();
                   setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });

          }else{
            $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-category-status',
                data : {status:'0',id:id},
                success:function(resp){
                   $("#message_error").show();
                   setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });
          }

         });
            //Update Banner Status
            $(".BannerStatus").change(function(){
          var id = $(this).attr('rel');
          if($(this).prop("checked")==true){
             $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-banner-status',
                data : {status:'1',id:id},
                success:function(data){
                   $("#message_success").show();
                   setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });

          }else{
            $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-banner-status',
                data : {status:'0',id:id},
                success:function(resp){
                   $("#message_error").show();
                   setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });
          }
         });

         //Add Remove Fields Dynamically
         $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="display:flex;"><input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><input type="text" name="size[]" id="size" placeholder="Size" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><input type="text" name="price[]" id="price" placeholder="Price" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control" style="width:120px;margin-right:5px;margin-top:5px;"/><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
      });
         </script>
      <script>
         function dash() {
         // single bar chart
         var ctx = document.getElementById("singelBarChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
         datasets: [
         {
         label: "My First dataset",
         data: [40, 55, 75, 81, 56, 55, 40],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
               //monthly calender
               $('#m_calendar').monthly({
                 mode: 'event',
                 //jsonUrl: 'events.json',
                 //dataType: 'json'
                 xmlUrl: 'events.xml'
             });

         //bar chart
         var ctx = document.getElementById("barChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
         datasets: [
         {
         label: "My First dataset",
         data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         },
         {
         label: "My Second dataset",
         data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
         borderColor: "rgba(51, 51, 51, 0.55)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(51, 51, 51, 0.55)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
             //counter
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
         }
         dash();
      </script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js"></script>


   </body>
</html>
