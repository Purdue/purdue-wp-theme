const themeSelectors=document.querySelectorAll('.theme-selector');
if(themeSelectors.length>0){
    themeSelectors.forEach(el => {
        el.addEventListener('change',()=>{
            if(el.value !==''){
                const selected="#"+el.value;
                const selectedEl=document.querySelector(selected);
                const jump=selectedEl.offsetTop;
                window.scroll({   
                    top: jump,
                    behavior: 'smooth'
                  })
            }
        })
    });
}