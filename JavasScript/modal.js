const modal = document.querySelector("#modal");
const btn = document.querySelector("#pedido");
const btnclose = document.querySelector("#cerrar-modal");

const saborSelect = document.querySelector("#sabor");
const presentacionSelect = document.querySelector("#presentacion");
const totalParagraph = document.querySelector("#total");

const cantidadInput = document.querySelector("#cantidad");

cantidadInput.addEventListener("input", calcularTotal);

console.log(cantidad)
const precios = {
    fresa: { "100": 2, "250": 4.5, "500": 9 },
    durazno: { "100": 2, "250": 4.5, "500": 9 },
    piña: { "100": 1.5, "250": 3, "500": 6 },
    mango: { "100": 2, "250": 4.5, "500": 9 },
    guayaba: { "100": 1.5, "250": 3, "500": 6 }
};

btn.addEventListener("click", () => {
    modal.showModal();
});

btnclose.addEventListener("click", () => {
    modal.close();
});

function calcularTotal() {
    const sabor = saborSelect.value;
    const presentacion = presentacionSelect.value;
    const cantidad = parseInt(document.querySelector("#cantidad").value);
    
    if (sabor && presentacion && !isNaN(cantidad) && cantidad > 0) {
        const precio = precios[sabor][presentacion] * cantidad;
        totalParagraph.textContent = `Total a pagar: $${precio.toFixed(2)}`;
    } else {
        totalParagraph.textContent = "Total a pagar: 0.00$";
    }
}
saborSelect.addEventListener("change", calcularTotal);
presentacionSelect.addEventListener("change", calcularTotal);
