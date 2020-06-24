const collapsedSection = document.querySelector('.collapsed-section');
if(collapsedSection){
    const paras = collapsedSection.querySelectorAll('p');
    let newPara = document.createElement("p"); 
    let more = document.createElement("span"); 
    let less = document.createElement("span"); 
    const moreContent = document.createTextNode('Expand/Read More');
    const lessContent = document.createTextNode('Show less');
    more.appendChild(moreContent);
    less.appendChild(lessContent);
    more.classList.add('collapsed-button');
    less.classList.add('collapsed-button');
    if(paras.length>0){
        let text = paras[0].innerText;
        if(text.length>300){
            text = text.substr(0, text.lastIndexOf(' ', 299));  
        }
        if (text[text.length-1] === "."){
            text = text.slice(0,-1);  
        }  
        newPara.innerHTML = text +'...';
        newPara.appendChild(more);
        collapsedSection.insertBefore(newPara, paras[0]);
        paras[paras.length-1].innerHTML = paras[paras.length-1].innerHTML+'...';
        paras[paras.length-1].appendChild(less);
        paras.forEach((para)=>{
            para.classList.add('hide');
        })
        more.addEventListener('click',()=>{
            paras.forEach((para)=>{
                para.classList.remove('hide');
            })
            newPara.classList.add('hide');
        })
        less.addEventListener('click',()=>{
            paras.forEach((para)=>{
                para.classList.add('hide');
            })
            newPara.classList.remove('hide');
        })
    }
}
