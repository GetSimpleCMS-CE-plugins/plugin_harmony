
if(document.querySelector('.harmonytab')!==null){



document.querySelectorAll('.harmonytab-content')[0].classList.add('show');
document.querySelectorAll('.harmonytab-btn')[0].classList.add('active');

document.querySelectorAll('.harmonytab-btn').forEach((x,i)=>{

    x.addEventListener('click',()=>{

        document.querySelectorAll('.harmonytab-btn').forEach(e=>{e.classList.remove('active')}); 
    x.classList.add('active');

    document.querySelectorAll('.harmonytab-content').forEach(c=>{c.classList.remove('show')});
    document.querySelectorAll('.harmonytab-content')[i].classList.add('show');
    });

});


}