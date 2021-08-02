<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="heading-section">Inscription</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user-o"></span>
                    </div>
                    <h3 class="text-center mb-4">Renseignez vos informations :</h3>
                    <form action="login" class="login-form mx-auto"  method=POST>
                        <input type="hidden" name="from" value="inscription">
                        <div class="form-group my-2">
                            <input type="text" class="form-control rounded-left" placeholder="Nom d'utilisateur" name="username" required>
                        </div>
                        <div class="form-group my-2">
                            <input type="text" class="form-control rounded-left" placeholder="Adresse email" name="email" required>
                        </div>
                        <div class="form-group d-flex">
                            <input type="password" class="form-control rounded-left" placeholder="Mot de Passe" name="password" required>
                        </div>
                        <div class="form-group d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-primary rounded submit px-5 p-3">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>