
if(document.querySelector('.harmonyaccordion')!==null){
 
        document.querySelectorAll('.harmonyaccordion-btn').forEach((x,i)=>{

            x.addEventListener('click',()=>{

         
                if(document.querySelectorAll('.harmonyaccordion-content')[i].classList.contains('show')==false){
                    document.querySelectorAll('.harmonyaccordion-content').forEach(
                    c=>{
                        c.classList.remove('show')
                });

         
                document.querySelectorAll('.harmonyaccordion-content')[i].classList.add('show');
 
                }else{
                    document.querySelectorAll('.harmonyaccordion-content').forEach(
                    c=>{
                        c.classList.remove('show')
                });  
                }
 

            })
        });

    };