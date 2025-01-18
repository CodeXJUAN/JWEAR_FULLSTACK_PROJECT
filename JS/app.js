buscador();

function buscador() {
    let nav = document.getElementById("desktop-nav");
    let search = nav.getElementsByClassName("nav_buttons")[0];
    let inputElement;

    function toggleInput() {
        if (!inputElement) {
            // Crear el elemento input solo una vez
            inputElement = document.createElement("input");
            inputElement.type = "text";
            inputElement.placeholder = "Serach...";
            inputElement.className = "search-input";
            nav.appendChild(inputElement);
        } else {
            // Alternar la visibilidad del input
            if (inputElement.style.display === "none" || inputElement.style.display === "") {
                inputElement.style.display = "block";
            } else {
                inputElement.style.display = "none";
            }
        }
    }
    
    search.addEventListener("click", toggleInput);
}