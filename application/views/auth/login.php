<div style="display: flex; justify-content: center;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?= base_url('auth') ?>">
                    <div class="form-group">
                      <label for="email">Email Address:</label>
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                      <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="email">Password:</label>
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    <!-- <div class="text-center">
                      <a class="small" href="<?= base_url(); ?>auth/registration">Create an Account!</a>
                    </div> -->
                  </form> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
