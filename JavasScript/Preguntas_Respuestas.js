(function()
{
    const TituloPreguntas = [...document.querySelectorAll('.Pregunta_Titulo')];
    console.log(TituloPreguntas)

    TituloPreguntas.forEach(Pregunta =>
    {
        Pregunta.addEventListener('click', ()=>
        {
            let height = 0;
            let Respuesta = Pregunta.nextElementSibling;
            let addPadding = Pregunta.parentElement.parentElement;

            addPadding.classList.toggle('Preguntas_Padding--add');
            Pregunta.children[0].classList.toggle('Pregunta_Arrow--rotate');

            if(Respuesta.clientHeight === 0)
            {
                height = Respuesta.scrollHeight;
            }

            Respuesta.style.height = `${height}px`;

        });
    });
})
();