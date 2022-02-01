(function () {

    const formulario = document.querySelector('form'),
        elementos = formulario.elements;

    const validarInputs = function () {
        for (var i = 0; i < elementos.length; i++) {
            if (elementos[i].type === "text" || elementos[i].type === "email" || elementos[i].type === "password") {
                if (elementos[i].value.length == 0) {
                    elementos[i].className = elementos[i].className + " error";
                    return false;
                } else {
                    elementos[i].className = elementos[i].className.replace(" error", "");
                }
            }
        }
        return true;
    };



    const enviar = function (e) {
        if (!validarInputs()) {
            e.preventDefault();
        }
    };

    const focusInput = function () {
        this.parentElement.children[1].className = "label active";
        this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
    };

    const blurInput = function () {
        if (this.value <= 0) {
            this.parentElement.children[1].className = "label";
            this.parentElement.children[0].className = this.parentElement.children[0].className + " error";
        }
    };

    // --- Eventos ---
    formulario.addEventListener("submit", enviar);

    for (var i = 0; i < elementos.length; i++) {
        if (elementos[i].type === "text" || elementos[i].type === "email" || elementos[i].type === "password") {
            elementos[i].addEventListener("focus", focusInput);
            elementos[i].addEventListener("blur", blurInput);
        }
    }

}())