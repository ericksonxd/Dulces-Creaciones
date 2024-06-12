const Menu = document.querySelector('.Menu')
const Menu1 = document.querySelector('.Menu-Navegacion')


Menu.addEventListener('click', ()=>{
    Menu1.classList.toggle("spread")
})

window.addEventListener('click', e =>{
    if(Menu1.classList.contains('spread') 
        && e.target != Menu1 && e.target != Menu){
        console.log('cerrar')
        Menu1.classList.toggle("spread")
    }
})