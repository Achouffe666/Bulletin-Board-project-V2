
    document.querySelector('#button_reply').addEventListener('click',()=>{
      
        document.querySelector('.row-message2').classList.add('row-message3');
        document.querySelector('.row-message2').classList.remove('row-message2')
    });
    document.querySelector('#cancel').addEventListener('click',()=>{
        document.querySelector('.row-message3').classList.add('row-message2');
        document.querySelector('.row-message3').classList.remove('row-message3');
    });
    document.querySelector("#delete").addEventListener("click", ()=>
    {
        console.log("hello");
    });