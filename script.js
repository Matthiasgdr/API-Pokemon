let spriteContainer = document.querySelectorAll('.sprites-container')

for (const sprite of spriteContainer) {
    sprite.addEventListener('mouseover', () => {
        let sprite0 = sprite.querySelector('.sprite-0')
        let sprite1 = sprite.querySelector('.sprite-1')
        sprite0.style.display = "none"
        sprite1.style.display = "block"
    })  
    sprite.addEventListener('mouseout', () => {
        let sprite0 = sprite.querySelector('.sprite-0')
        let sprite1 = sprite.querySelector('.sprite-1')
        sprite0.style.display = "block"
        sprite1.style.display = "none"
    })  
}