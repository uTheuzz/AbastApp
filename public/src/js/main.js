(function(win,doc){
    'use strict';

    //Delete
    function confirmDel(event)
    {
        event.preventDefault();

        let url = event.target.parentNode.parentNode.href
        let active = ''
        if(url.match('usuarios')){
            active = 'usuarios'
        }
        if(url.match('veiculos')){
            active = 'veiculos'
        }
        if(url.match('dashboard')){
            active = 'dashboard'
        }
        if(url.match('relatorio')){
            active = 'relatorio'
        }

        let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Tem certeza?")){
           let ajax=new XMLHttpRequest();
           ajax.open("DELETE",event.target.parentNode.parentNode.href);
           ajax.setRequestHeader('X-CSRF-TOKEN',token);
           ajax.onreadystatechange=function(){
               if(ajax.readyState === 4 && ajax.status === 200){
                   win.location.href=active;
               }
           };
           ajax.send();
        }else{
            return false;
        }
    }
    if(doc.querySelector('.js-del')){
        let btn=doc.querySelectorAll('.js-del');
        for(let i=0; i < btn.length; i++){
            btn[i].addEventListener('click',confirmDel,false);
        }
    }
})(window,document);
