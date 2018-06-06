<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Password reset</title>
        <link rel="stylesheet" href="<?= $assetsPath ;?>/styles.css"  />
    </head>
    <body>
        <div class="container" style="padding-top:50px; padding-bottom: 50px">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <form method="post">

                        <h3 class="text-center">Password reset</h3>

                        <?php foreach( $messages as $type => $message){ ?>
                            <div class="alert alert-<?= $type ;?>"><?= $message ;?></div>
                        <?php } ?>

                        <?php if( config_item('csrf_protection') === TRUE) { ?>

                            <?php
                                $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                                );
                            ?>

                            <input type="hidden" name="<?= $csrf['name'] ;?>" value="<?= $csrf['hash'] ;?>" />

                        <?php } ?>

                        <div class="form-group <?= isset($validationErrors['new_password']) ? 'has-error has-feedback' : '' ;?>">
                            <label>New password</label>
                            <input type="password" name="new_password" class="form-control" required />
                            <?php if(isset($validationErrors['new_password'])) { ?>
                                <div class="help-block"><?= $validationErrors['new_password'] ;?></div>
                            <?php } ;?>
                        </div>

                        <div class="form-group <?= isset($validationErrors['repeat_password']) ? 'has-error has-feedback' : '' ;?>">
                            <label>Repeat new password</label>
                            <input type="password" name="repeat_password" class="form-control" required />
                            <?php if(isset($validationErrors['repeat_password'])) { ?>
                                <div class="help-block"><?= $validationErrors['repeat_password'] ;?></div>
                            <?php } ;?>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Change password</button>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>