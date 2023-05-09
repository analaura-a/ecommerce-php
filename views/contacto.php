<section class="container-contacto container mt-5">
    <div class="contact-info">
        <h1 class="h1">¡Contactanos! &#128140;</h1>
        <p class="mt-3">Ya sea que tengas dudas sobre alguna prenda en particular, estés interesada en vender ropa de Lilac en tu local o quieras trabajar con nosotras, <span class="fw-bold">¡no dudes en comunicarte!</span></p>
        <p class="mt-1">Te responderemos a la brevedad.</p>

        <?php

        if (isset($_POST['submit'])) {

            if (isset($_POST['inputName'])) {
                $name = $_POST['inputName'];
            }

            if (isset($_POST['inputEmail'])) {
                $email = $_POST['inputEmail'];
            }

            if (isset($_POST['inputPhone'])) {
                $phone = $_POST['inputPhone'];
            } else {
                $phone = 'No ingresaste ningún teléfono';
            }

            if (isset($_POST['formControlTextarea'])) {
                $message = $_POST['formControlTextarea'];
            }


            echo "<div class='mt-5 card-message-form'>
                <h2 class='lilac-text fs-4'>¡Bien! Información enviada</h2> 
                <p class='mt-2'>El nombre que ingresaste es <b>" . $name . "</b>.</p>
                <p class='mt-1'>El email que ingresaste es <b>" . $email . "</b>.</p>
                <p class='mt-1'>El teléfono que ingresaste es <b>" . $phone . "</b>.</p>
                <p class='mt-1'>Tu mensaje es <b>" . $message . "</b>.</p>

                <p class='fw-bold mt-4'>¡Gracias por comunicarte con nosotras! &#128156;</p>
            </div>";
        }


        ?>

    </div>

    <form action="" method="post" class="contact-form">

        <div class="mb-4">
            <label class="form-label" for="inputName">Nombre<span class="lilac-text">*</span></label>
            <input type="text" class="form-control" id="inputName" name="inputName" required>
        </div>

        <div class="mb-4">
            <label for="inputEmail" class="form-label">Email<span class="lilac-text">*</span></label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" required>
        </div>

        <div class="mb-4">
            <label for="inputPhone" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="inputPhone" name="inputPhone">
        </div>

        <div class="mb-4">
            <label for="formControlTextarea" class="form-label">Mensaje<span class="lilac-text">*</span></label>
            <textarea class="form-control" id="formControlTextarea" name="formControlTextarea" rows="4" required></textarea>
            <div id="textareaHelp" class="form-text">¿Cuál es la razón por la que nos estás contactando?</div>
        </div>

        <button type="submit" name="submit" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-4 rounded-3 mb-0 mx-auto d-block letter-spacing-1" style="max-width:500px">ENVIAR</button>

    </form>

</section>