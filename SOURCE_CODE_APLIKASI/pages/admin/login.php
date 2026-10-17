<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="FokusKonten">>

    <title>BarberCashier Pro - FokusKonten</title>

    <!-- Bootstrap Core CSS -->
   <link href="../../dist/bootstrap/css/bootstrap.css" rel="stylesheet"> 
 
    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">


<!-- FK-GEMINI-THEME -->
<style>
/* FokusKonten Gemini Clean Light Theme - Barbershop & Salon */
body {
  background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 50%, #f8fafc 100%) !important;
  color: #1e293b !important;
}
.fk-badge-brand, .app-brand, .login-logo, .brand-logo {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 82px !important;
  height: 82px !important;
  border-radius: 50% !important;
  background: #ffffff !important;
  border: 2px solid #fce7f3 !important;
  box-shadow: 0 8px 24px -4px rgba(190, 24, 93, 0.25) !important;
  margin-bottom: 16px !important;
  padding: 3px !important;
}
.fk-badge-brand img, .app-brand img, .login-logo img, .brand-logo img, img.fk-logo-constrained {
  width: 100% !important;
  height: 100% !important;
  max-width: 76px !important;
  max-height: 76px !important;
  border-radius: 50% !important;
  object-fit: cover !important;
  display: block !important;
}
.btn-primary, .btn-submit, button[type="submit"] {
  background: linear-gradient(135deg, #be185d 0%, #db2777 50%, #f472b6 100%) !important;
  border-color: #be185d !important;
  color: #ffffff !important;
  box-shadow: 0 4px 14px 0 rgba(190, 24, 93, 0.25) !important;
}
.btn-primary:hover, .btn-submit:hover, button[type="submit"]:hover {
  transform: translateY(-1px);
  filter: brightness(1.05);
  color: #ffffff !important;
}
/* Sanitasi Dark Mode Template Lama */
.sidebar-dark, .sidebar-dark-primary, .bg-dark, .navbar-dark, .skin-black {
  background: #ffffff !important;
  color: #1e293b !important;
  border-color: #e2e8f0 !important;
}
</style>
<!-- /FK-GEMINI-THEME -->

</head>

<body style="background-color:#000000">
<center>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" align="center">
                    <a href="../"><h3 class="panel-title"><img src="../../dist/gambar/admin.png" /></h3></a>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="proseslogin.php" name="postform">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="col-md-3 col-md-offset-9 btn btn-warning">Login</button>
                            </fieldset>
                        </form>
<div class="text-center" style="margin-top: 15px; font-size: 12px; color: #64748b; font-family: sans-serif;">Powered by <a href="https://fokuskonten.my.id" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">FokusKonten</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</center>
</body>

</html>
