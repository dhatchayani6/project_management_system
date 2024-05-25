<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container">
         <a class="navbar-brand" href="index.html"><img width="250" src="home/images/logo.png" alt="#" /></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#about">ABOUT</a> <!-- Anchor link to the About section -->
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
               </li>
               <li class="nav-item dropdown" style="margin-left: 10px;"> <!-- Adjust the value according to your preference -->
  <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    REGISTER
  </a>
  <div class="dropdown-menu" aria-labelledby="registerDropdown">
    <a class="dropdown-item" href="#">ADMIN</a>
    <a class="dropdown-item" href="#">DEVELOPER</a>
    <a class="dropdown-item" href="{{route('student')}}">STUDENT</a>
  </div>
</li>
            </ul>
         </div>
      </nav>
   </div>
</header>