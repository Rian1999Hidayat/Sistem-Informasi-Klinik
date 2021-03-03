<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?= base_url('login') ?>">
                <div class="form-group">
                  
                  <input class="form-control" placeholder="Email" type="text" name="email" id="email">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  
                  <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                </div>
              </form>
</body>
</html>