<nav class="navbar navbar-light bg-faded">
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-toggleable-md" id="navbarResponsive">
        <a class="navbar-brand" href="/" style="padding-top:0; padding-bottom:0;">
            <?= $this->Html->image('logo.png', ['alt' => 'Property image', 'height'=>'40px']); ?>
        </a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <?= $this->Html->link(__('Home'), '/', ['class' => 'nav-link']); ?>
            </li>

            <?php if (!$loggedIn): ?>
            <li class="nav-item">
                <?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login'], ['class' => 'nav-link']); ?>
            </li>
            <?php endif; ?>

            <?php if (!$loggedIn): ?>
            <li class="nav-item">
                <?= $this->Html->link(__('Register'), ['controller' => 'users', 'action' => 'register'], ['class' => 'nav-link']); ?>
            </li>
            <?php endif; ?>
            <?php if ($loggedIn): ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                    <?php
                        if ($adminLoggedIn) {
                            echo $this->Html->link(__('Admin Dashboard'), ['controller' => 'admin', 'action' => 'index'], ['class' => 'dropdown-item']);
                        }
                    ?>
                    <?= $this->Html->link(__('Dashboard'), ['controller' => 'users', 'action' => 'dashboard'], ['class' => 'dropdown-item']); ?>
                    <?= $this->Html->link(__('My Profile'), ['controller' => 'users', 'action' => 'view'], ['class' => 'dropdown-item']); ?>
                    <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'dropdown-item']); ?>
                </div>
            </li>
            <?php endif; ?>


        </ul>
        <?= $this->Form->create(NULL, ['url' => ['controller' => 'properties', 'action' => 'search'], 'class' => 'form-inline float-lg-right', 'type' => 'get']); ?>
            <input class="form-control" type="text" name="address" placeholder="Street or Zipcode">
            <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
        <?= $this->Form->end(); ?>
    </div>
</nav>
