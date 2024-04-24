<div class="row">
    <div class="col-12 px-2">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url($profile->picture_path) ?>" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= $profile->username ?></h3>
                <p class="text-muted text-center"><?= $profile->email ?></p>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body">
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
        </div>
    </div>
</div>