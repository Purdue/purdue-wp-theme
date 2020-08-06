const diCloumns=document.querySelectorAll(".has-dividers")

if(diCloumns&&diCloumns.length>0){
    const width = window.innerWidth-48;
    diCloumns.forEach((e)=>{
        const diCloumn=e.querySelectorAll(".column")
        if(diCloumn&&diCloumn.length>0){
            diCloumn.forEach((e)=>{
                if (parseInt(window.getComputedStyle(e).getPropertyValue('width'),10)>=width){
                    e.classList.add("no-border")                   
                }
                window.addEventListener("resize", ()=>{
                    const newWidth = window.innerWidth-48;
                    parseInt(window.getComputedStyle(e).getPropertyValue('width'),10)>=newWidth?e.classList.add("no-border"):e.classList.remove("no-border")
                })
            })
        }
    })
}

