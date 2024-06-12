const Imagenes = document.querySelectorAll('.Img-Galeria')
const ImagenLight = document.querySelector('.Agregar-Imagen');
const ContenedorLight = document.querySelector('.Imagen-Light')
const CloseLight = document.querySelector('.X')


Imagenes.forEach(imagen => {
    imagen.addEventListener('click',()=>{
        AparecerImagen(imagen.getAttribute('src'));
    })
});

ContenedorLight.addEventListener('click',(e)=>{
    if(e.target !== ImagenLight){
        ContenedorLight.classList.toggle('show')
        ImagenLight.classList.toggle('showImage')
        Menu.style.opacity = '1';
    }
})


const AparecerImagen = (imagen)=>{
    ImagenLight.src = imagen;
    ContenedorLight.classList.toggle('show')
    ImagenLight.classList.toggle('showImage')
    Menu.style.opacity = '0';
}