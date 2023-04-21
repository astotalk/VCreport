<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>LTS</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
   
      <link rel="icon" href="{{url('lts_assets/images/fevicon.png')}}"/>

      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{url('lts_assets/css/bootstrap.min.css')}}"/>
      <!-- site css -->
      <link rel="stylesheet" href="{{url('lts_assets/css/app.css')}}">
      
      <!-- responsive css -->
      <link rel="stylesheet" href="{{url('lts_assets/css/responsive.css')}}"/>
     
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{url('lts_assets/css/bootstrap-select.css')}}"/>
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{url('lts_assets/css/perfect-scrollbar.css')}}"/>
   </head>

<body class="inner_page login">
   <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
            @if(session('error'))
        <div class="text-danger text-center">{{session('error')}}</div>
        @endif
      
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        
                        <img width="210" src="{{url('lts_assets/images/logo/logo.png')}}" alt="#" />
                        
                     </div>
                  </div>
                  
                  <div class="login_form">
                     
                  <form action="{{route('postlogin')}}" method="post">
                  @if(session('success'))
                           <div class="text-success text-center">{{session('success')}}</div>
                           @endif
                     @csrf
                     
                        <fieldset>
                           
                           <div class="field">
                         
                              <label class="label_field">Email Address</label>
                              <input name="email" type="email" class="email form-control" placeholder="Email">
                           </div>
                           @error('email')
                           <div class="textdanger">{{$message}}</div>
                           @enderror
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input  name="password" type="password" class="password form-control" placeholder="Password">
                           </div>
                           @error('password')
                        <div class="textdanger">{{$message}}</div>
                        @enderror
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button type="submit" class="main_bt">Sing In</button>
                              <button  type="submit" class="main_bt"><a href="#>Sing Up</a> </button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{url('lts_assets/js/jquery.min.js')}}"></script>
      <script src="{{url('lts_assets/js/popper.min.js')}}"></script>
      <script src="{{url('lts_assets/js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{url('lts_assets/js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{url('lts_assets/js/bootstrap-select.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{url('lts_assets/js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{url('lts_assets/js/custom.js')}}"></script>
   </body>
</html>
