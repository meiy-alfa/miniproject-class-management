<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "partials/top_section.php"; ?>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../assets/login_css.css">    
    </head>
    <body>
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="<?= site_url('auth/login_process')?>" method="post">
                                <h3 class="text-center">Login</h3>

                                <?php if ($this->session->errors) : ?>
                                    <div class="alert alert-danger">
                                        <?= $this->session->errors ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <button class="btn btn-primary">Login</button>
                            </form>
                            <br>
                            <a><center>Mini Project</center></a>
                            <a><center>Manajemen Kelas</center></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "partials/bottom_section.php"; ?>
    </body>
</html>