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

    <title>BarberCashier - FokusKonten</title>

    <!-- Bootstrap Core CSS -->
   <link href="../dist/bootstrap/css/bootstrap.css" rel="stylesheet"> 
 
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">


<!-- FK-GEMINI-THEME -->
<style>
/* FokusKonten Gemini Clean Light Theme - Barbershop & Salon */
body {
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 50%, #f8fafc 100%) !important;
  color: #1e293b !important;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
}
.fk-badge-brand, .app-brand, .login-logo, .brand-logo {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 82px !important;
  height: 82px !important;
  border-radius: 50% !important;
  background: #ffffff !important;
  border: 2px solid #fde68a !important;
  box-shadow: 0 8px 24px -4px rgba(217, 119, 6, 0.25) !important;
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
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  border-color: #d97706 !important;
  color: #ffffff !important;
  box-shadow: 0 4px 14px 0 rgba(217, 119, 6, 0.25) !important;
  font-weight: 700 !important;
}
.btn-primary:hover, .btn-submit:hover, button[type="submit"]:hover {
  background: #b45309 !important;
  border-color: #92400e !important;
  transform: translateY(-1px);
  filter: brightness(1.05);
  color: #ffffff !important;
}
.login-panel {
  border-radius: 12px !important;
  box-shadow: 0 10px 25px -5px rgba(217, 119, 6, 0.12), 0 8px 10px -6px rgba(0, 0, 0, 0.05) !important;
  border: 1px solid #fde68a !important;
  background: #ffffff !important;
}
</style>
<!-- /FK-GEMINI-THEME -->

</head>

<body>
<center>
    <div class="container" style="padding-top: 50px;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" align="center" style="background: #ffffff; border: none; padding-top: 26px; padding-bottom: 8px;">
                      <div class="fk-badge-brand">
                        <img src="../logo.png" alt="BarberCashier Logo" onerror="this.onerror=null; this.src='../favicon.png';">
                      </div>
                      <h4 style="font-weight: 800; color: #92400e; margin: 0 0 4px 0; letter-spacing: -0.3px;">BarberCashier POS</h4>
                      <p style="font-size: 13px; color: #b45309; margin: 0; font-weight: 500;">Kasir Barbershop & Komisi Capster</p>
                    </div>
                    <div class="panel-body" style="padding: 20px 25px 25px 25px;">
                        <form role="form" method="post" action="proseslogin.php" name="postform">
                            <fieldset>
                                <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Nama Pengguna (Username)" name="username" type="text" value="admin" autofocus style="border-radius: 8px; height: 42px;">
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" placeholder="Kata Sandi (Password)" name="password" type="password" value="admin" style="border-radius: 8px; height: 42px;">
                                </div>
                                <div class="form-group mb-4">
                                    <select class="form-control" name="shift" required="required" style="border-radius: 8px; height: 42px;">
                                        <option value="1" selected>Kasir Pagi (Shift 1)</option>
                                        <option value="2">Kasir Siang (Shift 2)</option>
                                        <option value="3">Kasir Sore (Shift 3)</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" style="font-weight: 700; border-radius: 8px; padding: 11px;">Masuk ke Sistem</button>
                            </fieldset>
                        </form>
<div class="text-center" style="margin-top: 18px; font-size: 12px; color: #64748b; font-family: sans-serif; border-top: 1px solid #fde68a; padding-top: 12px;">Powered by <a href="https://fokuskonten.my.id" target="_blank" style="color: #b45309; font-weight: 700; text-decoration: none;">FokusKonten</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</center>
</body>

</html>
