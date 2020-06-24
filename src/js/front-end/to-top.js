// back to top button

const toTop = document.querySelector('#to-top')
if(toTop){
  toTop.addEventListener('click', () => {
    window.scroll({
      top: 0,
      behavior: 'smooth'
    })
  })
  
  window.addEventListener('scroll', () => {
    if (window.scrollY > 600) {
      toTop.classList.remove('to-top-hidden')
      toTop.classList.add('to-top-shown')
      const footer = document.getElementsByTagName('footer')[0]
      const start = window.innerHeight-footer.getBoundingClientRect().top;
  
      if (start >= 80){
        toTop.classList.add('to-top-relative')
      } else if(start < 80){ 
        toTop.classList.remove('to-top-relative')
      }
    } else {
      toTop.classList.remove('to-top-shown')
      toTop.classList.add('to-top-hidden')
      toTop.classList.remove('to-top-relative')
    } 
  })
}
