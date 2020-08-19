const tables=document.querySelectorAll('figure.wp-block-table');

tables.forEach((t)=>{
    const thead=t.getElementsByTagName("thead");
    const tfoot=t.getElementsByTagName("tfoot");
    const tbody=t.getElementsByTagName("tbody");
    let ths=[];
    let tfs=[];
    let trlength;
    if(thead.length>0){
        ths=thead[0].getElementsByTagName("th")
    }
    if(tfoot.length>0){
        tfs=tfoot[0].getElementsByTagName("td")
    }
    const trs=tbody[0].getElementsByTagName("tr")
    if(trs.length>0){
        trlength=trs[0].getElementsByTagName("td").length;
    }
    for(i=0; i<trlength; i++){
        console.log(trlength)
        let newt = document.createElement("div"); 
        newt.classList.add('wp-block-table-mobile')
        if(thead.length>0&&ths[i].innerText){
            let newth = document.createElement("div");
            newth.classList.add('table-header')
            newth.innerHTML = ths[i].innerText;
            newt.appendChild(newth)
        }
        trs.forEach((tr)=>{
            let newtb = document.createElement("div");
            const tbs=tr.getElementsByTagName("td");
            if(tbs[i].innerText){
                newtb.classList.add('table-body')
                newtb.innerHTML = tbs[i].innerText;
                newt.appendChild(newtb)
            }
        })
        if(tfoot.length>0&&tfs[i].innerText){
            let newtf = document.createElement("div");
            newtf.classList.add('table-footer')
            newtf.innerHTML = tfs[i].innerText;
            newt.appendChild(newtf)
        }
        t.parentElement.insertBefore(newt, t);
    }
    
})
