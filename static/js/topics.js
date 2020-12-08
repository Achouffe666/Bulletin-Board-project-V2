    
    //cancel with the button "create" (declaring i)


    // Create form
    document.querySelector('#btn').addEventListener('click',()=>{
        topicsForm();
    });

    document.querySelector('#btn2').addEventListener('click',()=>{
        topicsForm();
    });


function topicsForm(){
  
    document.querySelector('.form_topics').classList.add('form_topics_display');
    document.querySelector('.form_topics').classList.remove('form_topics');


    //cancel with button
        document.querySelector('#cancel').addEventListener('click',()=>{
        document.querySelector('.form_topics_display').classList.add('form_topics');
        document.querySelector('.form_topics_display').classList.remove('form_topics_display');
})
}


