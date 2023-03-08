<!doctype html>
<html lang="en">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Login Page Layanan Masyarakat Ahmad Rohdiansyah</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      table,tr,td {
    border: 1px solid black;
}
p{
    color:blue;
}
thead {
    background-color: aqua;
}
h3{
    text-align: center;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
    font-family: Arial, sans-serif;
    font-size: 16px;
    padding-left: 300px;
    margin: auto;
    background-color: gray;
}
table td {
     padding:10px;
     border-top:1px black solid;
     border-bottom:1px black solid;
     text-align:center; 
    }         
 tr:nth-child(even) {
     background-color: skyblue; 
 }
 body {
    height: 100vh;
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(180,8,8,0.9444152661064426) 23%, rgba(0,212,255,1) 100%);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
 }
 h2{
        color: whitesmoke;
        font-size: 50px;
        align-content: center;
    } 
    button {
        display: inline-block;
        padding: 10px 15px;
        font-size: 18px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: red;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        margin-top: 20px;
     }
     button:hover {
        background-color: aqua; 
      }
    .button:active {
        background-color: green;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
    h1 {
  font-size: 72px;
  background: -webkit-linear-gradient(#00FFFF 0%, #9932CC 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
    }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
        echo "Login gagal! username dan password salah!";
      }else if($_GET['pesan'] == "logout"){
        echo "Anda telah berhasil logout";
      }else if($_GET['pesan'] == "belum_login"){
        echo "Anda harus login untuk mengakses halaman admin";
      }
    }
    ?>
<form class="form-signin" action="conn/aksi_login.php" method="post" >
  <img class="mb-4" src="img/userbg.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Silakan Login </h1>
  <label for="inputusername" class="sr-only">username</label>
  <input name="username" type="username" id="inputusername" class="form-control" placeholder="username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Ingatkan saya/Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <center>
  <p class="mt-5 mb-3 text-muted">@ Ahmad Rohdiansyah</p>
</form>
   
    
  </body>
</html>
