<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/registration.css') ?>">
</head>

<body>
    <div id="form-tab" class="col-6">
        <?php
        if (isset($errors)) {
            echo "<div class='alert alert-danger role='alert'>";
            echo "une erreur c'est produite </div>";
        }
        ?>

        <h2 class="text-dark mb-3" style="text-align:center;">Inscription</h2>
        <form action="<?= base_url() . 'admin/register/register_post' ?>" method="post">
            <?php echo form_open('admin/register/register_post') ?>
            <div class="mb-3">
                <label for="username" class="form-label">Nom :</label>
                <input type="text" name="username" class="form-control <?php echo (isset($errors['username']) ? 'is-invalid' : '') ?>" id="username" value="<?php echo (isset($errors) ? $data['username'] : '') ?>" placeholder="your name">
                <div class="invalid-feedback">
                    <?php echo (isset($errors['username']) ? $errors['username'] : '') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" value="<?php echo (isset($errors) ? $data['password'] : '') ?>" class="form-control <?php echo (isset($errors['password']) ? 'is-invalid' : '') ?>" id="password" placeholder="your password" />
                <div class="invalid-feedback">
                    <?php echo (isset($errors['password']) ? $errors['password'] : '') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirm_pwd" class="form-label"> Confirmer le mot de passe :</label>
                <input type="password" name="confirm_pwd" value="<?php echo (isset($errors) ? $data['confirm_pwd'] : '') ?>" class="form-control <?php echo (isset($errors['confirm_pwd']) ? 'is-invalid' : '') ?>" id="confirm_pwd" />
                <div class="invalid-feedback">
                    <?php echo (isset($errors['confirm_pwd']) ? $errors['confirm_pwd'] : '') ?>
                </div>
            </div>
            <div class="mb-3 text-end">
                <button class="btn btn-success col-12" type="submit">Envoyer</button>
            </div>
            <?php echo form_close() ?>
            <p class="text-start"><em>J'ai deja un compte <a href="<?= base_url() . "admin/login" ?>">se connecter</a>.</em></p>
        </form>
</body>

</html>