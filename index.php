<!-- iconos boostrap  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="./style.css">

<html lang="es">
    <main class="main-content">
        <section class="login-box">
            <section class="login-box__content">
                <h2 class="login-box__title">Inicio De Sesion</h2>
                    <form class="login-box__form" action="#">
                        <!-- campos de sesion  -->
                        <section class="login-box__form-input">
                            <input class="login-box__input" type="text" required>
                            <label class="login-box__label">Usuario</label>
                            <i class="bi bi-person-circle login-box__icon"></i>
                        </section>
                        <section class="login-box__form-input">
                            <input class="login-box__input" type="password" required>
                            <label class="login-box__label">Contraseña</label>
                            <i class="bi bi-lock-fill login-box__icon"></i>
                        </section>
                        <!-- boton  -->
                        <button type="submit" class="btn btn-login">Iniciar Sesion</button>
                    </form>
            </section>
            <section class="login-box__message">
                <h2>Bienvenido A La Universidad De Boyaca</h2>
                <p>Donde todos valemos vergaaa</p>
            </section>
        </section>
    </main>
</html>