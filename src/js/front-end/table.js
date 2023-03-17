const tables=document.querySelectorAll('figure.wp-block-table');

tables.forEach((t)=>{
    const thead=t.getElementsByTagName("thead");
    const tfoot=t.getElementsByTagName("tfoot");
    const tbody=t.getElementsByTagName("tbody");
    let trlength;
    const trs=[...tbody[0].getElementsByTagName("tr")]

    let ths;
    if(thead.length>0){
        ths=thead[0].getElementsByTagName("th");
    }
    if(trs.length>0){
        trlength=trs[0].getElementsByTagName("td").length;
    }
    trs.forEach((tr)=>{
        let newt = document.createElement("div"); 
        newt.classList.add('wp-block-table-mobile')
        for(i=0; i<trlength; i++){
            let newtb = document.createElement("div");
            const tbs=tr.getElementsByTagName("td");
            if(tbs[i].innerText){
                let newth = document.createElement("b");
                newtb.classList.add('table-body')
                if(thead&&thead.length>0&&ths[i].innerText!==""){
                    newth.innerHTML = ths[i].innerHTML;
                    newtb.appendChild(newth) 
                    newtb.insertAdjacentText('beforeend', ": ");
                } 
                let newContent =  tbs[i].innerHTML;          
                newtb.insertAdjacentHTML('beforeend', newContent);
                newt.appendChild(newtb)
            }
            t.parentElement.insertBefore(newt, t);
        }
    })
    
})
