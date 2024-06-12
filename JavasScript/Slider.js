(function()
    {
    
        const sliders = [...document.querySelectorAll('.Profesionales_Body')];
        const buttonSiguiente = document.querySelector('#Siguiente');
        const buttonAtras = document.querySelector('#Atras');
        let value;   

        buttonSiguiente.addEventListener('click', ()=>
        {
            changePosition(1);
        });

        buttonAtras.addEventListener('click', ()=>
        {
            changePosition(-1);
        });

        const changePosition = (add)=>
        {
            const currentProfesionales = document.querySelector('.Profesionales_Body_Show').dataset.id;
            value = Number(currentProfesionales);
            value+= add;


            sliders[Number(currentProfesionales)-1].classList.remove('Profesionales_Body_Show');
            if(value === sliders.length+1 || value === 0)
            {
                value = value === 0 ? sliders.length  : 1;
            }

            sliders[value-1].classList.add('Profesionales_Body_Show');
            
        }   
    }
)
();