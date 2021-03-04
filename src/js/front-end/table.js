const tables=document.querySelectorAll('figure.wp-block-table');

tables.forEach((t)=>{
    const thead=t.getElementsByTagName("thead");
    const tfoot=t.getElementsByTagName("tfoot");
    const tbody=t.getElementsByTagName("tbody");
    let trlength;
    const trs=tbody[0].getElementsByTagName("tr")

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
                if(i===0){
                    newtb.classList.add('table-header')
                }else{
                    newtb.classList.add('table-body')
                }
               
                newtb.innerHTML = tbs[i].innerHTML;
                newt.appendChild(newtb)
            }
            t.parentElement.insertBefore(newt, t);
        }
    })
    
})
