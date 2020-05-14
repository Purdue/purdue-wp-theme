// Search options page
let is_search_all_purdue_buttons =  [...document.getElementsByName('is_search_all_purdue')];
let is_search_all_purdue = document.querySelector('input[name="is_search_all_purdue"]:checked');
let search_engine_code_input = document.querySelector('input[name="search_engine_code"]');
let search_engine_code_label = document.querySelector('.search_engine_code');
if(is_search_all_purdue_buttons.length>0){
    is_search_all_purdue = is_search_all_purdue ? is_search_all_purdue.value:"all";
    search_engine_code_input.style.display = search_engine_code_input && is_search_all_purdue == "all" ? "none" : "block";
    search_engine_code_label.style.display = is_search_all_purdue == "all" ? "none" : "block";
    is_search_all_purdue_buttons.forEach((el) =>{
        el.addEventListener('click', () => {
        let is_search_all_purdue = document.querySelector('input[name="is_search_all_purdue"]:checked').value;
        search_engine_code_input.style.display = is_search_all_purdue == "all" ? "none" : "block";
        search_engine_code_label.style.display = is_search_all_purdue == "all" ? "none" : "block";
        })
    })    
}

// Footer information page
//footer resources links
let use_custom_footer_column_3 = document.querySelector('input[name="use_custom_footer_column_3"]');
let column_3_header = document.querySelector('.column-3-header');
let column_3_links_text = [...document.querySelectorAll('.column-3-links-text')];
let column_3_links_link = [...document.querySelectorAll('.column-3-links-link')];

let use_custom_footer_column_4 = document.querySelector('input[name="use_custom_footer_column_4"]');
let column_4_header = document.querySelector('.column-4-header');
let column_4_links_text = [...document.querySelectorAll('.column-4-links-text')];
let column_4_links_link = [...document.querySelectorAll('.column-4-links-link')];
if(use_custom_footer_column_3){
    use_custom_footer_column_3_checked = use_custom_footer_column_3.checked;
    if(!use_custom_footer_column_3_checked){
        column_3_header.parentNode.parentNode.style.display = 'none';
        column_3_links_link.forEach((l)=>{
            l.parentNode.parentNode.style.display = 'none';
        })
    }else{
        column_3_header.parentNode.parentNode.style.display = column_3_header.value===''?'none':'table-row';
        console.log(column_3_header.value)
        column_3_links_link.forEach((l)=>{
            l.parentNode.parentNode.style.display = l.value ===''||l.previousSibling.value===''?'none':'table-row';
        })
    }
    use_custom_footer_column_3.addEventListener('click',(event)=>{
        let n=0;
        if(use_custom_footer_column_3.checked){
            column_3_header.parentNode.parentNode.style.display = 'table-row';
            column_3_links_link.forEach((l)=>{
                if(l.value && l.value !==''){
                    l.parentNode.parentNode.style.display = 'table-row';
                    n++;
                }
            })
            if(n===0){
                column_3_links_link[0].parentNode.parentNode.style.display = 'table-row';
            }
        }else{
            column_3_header.parentNode.parentNode.style.display = 'none';
            column_3_links_link.forEach((l)=>{
                l.parentNode.parentNode.style.display = 'none';
            })
        }
    })
}
if(use_custom_footer_column_4){
    use_custom_footer_column_4_checked = use_custom_footer_column_4.checked;
    if(!use_custom_footer_column_4_checked){
        column_4_header.parentNode.parentNode.style.display = 'none';
        column_4_links_link.forEach((l)=>{
            l.parentNode.parentNode.style.display = 'none';
        })
    }else{
        column_4_header.parentNode.parentNode.style.display = column_4_header.value===''?'none':'table-row';
        column_4_links_link.forEach((l)=>{
            l.parentNode.parentNode.style.display = l.value ===''?'none':'table-row';
        })
    }
    use_custom_footer_column_4.addEventListener('click',(event)=>{
        let n=0;
        if(use_custom_footer_column_4.checked){
            column_4_header.parentNode.parentNode.style.display = 'table-row';
            column_4_links_link.forEach((l)=>{
                if(l.value && l.value !==''){
                    l.parentNode.parentNode.style.display = 'table-row';
                    n++;
                }
            })
            if(n===0){
                column_4_links_link[0].parentNode.parentNode.style.display = 'table-row';
            }
        }else{
            column_4_header.parentNode.parentNode.style.display = 'none';
            column_4_links_link.forEach((l)=>{
                l.parentNode.parentNode.style.display = 'none';
            })
        }
    })
}
//social media
let use_custom_socialLinks = document.querySelector('input[name="use_custom_socialLinks"]');
let social_links = [...document.querySelectorAll('.social-links')];
let plus_buttons = [...document.querySelectorAll('.dashicons-plus')]; 
let delete_buttons = [...document.querySelectorAll('.dashicons-no')]; 
if(use_custom_socialLinks){
    use_custom_socialLinks_checked = use_custom_socialLinks.checked;
    if(!use_custom_socialLinks_checked){
        social_links.forEach((sl)=>{
            sl.parentNode.parentNode.style.display = 'none';
        })
    }else{
        social_links.forEach((sl)=>{
            sl.parentNode.parentNode.style.display = sl.value ===''?'none':'table-row';
        })
    }
    use_custom_socialLinks.addEventListener('click',(event)=>{
        let n=0;
        if(use_custom_socialLinks.checked){
            social_links.forEach((sl)=>{
                if(sl.value && sl.value !==''){
                    sl.parentNode.parentNode.style.display = 'table-row';
                    n++;
                }
            })
            if(n===0){
                social_links[0].parentNode.parentNode.style.display = 'table-row';
            }
        }else{
            social_links.forEach((sl)=>{
                sl.parentNode.parentNode.style.display = 'none';
            })
        }
    })
    plus_buttons.forEach((pb)=>{
        pb.addEventListener('click',()=>{
            if(pb.parentNode.parentNode.style.display === 'table-row'&&pb.previousSibling.value!==''&&pb.parentNode.parentNode.nextSibling.style.display === 'none'){
                pb.parentNode.parentNode.nextSibling.style.display = 'table-row';
            }
        })
    })
    delete_buttons.forEach((db)=>{
        db.addEventListener('click',()=>{
            if(db.parentNode.parentNode.style.display === 'table-row'){
                db.parentNode.parentNode.style.display = 'none';
                db.previousSibling.previousSibling.value = '';
            }
        })
    })
}




