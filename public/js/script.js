const menuOpen = document.getElementById('menuOpen')
const menuClose = document.getElementById('menuClose')
const mobile = document.getElementById('mobile')

menuOpen.addEventListener('click', () => {
    mobile.style.visibility = 'visible'
})

menuClose.addEventListener('click', () => {
    mobile.style.visibility = 'hidden'
})
