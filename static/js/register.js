document.querySelector('#submit_password').addEventListener('click',()=>{
            let password = document.querySelector('#submit_password').value;
            let confirmPassword = document.querySelector('#confirmPassword').value;
            if (password != confirmPassword) { alert('Your password does not match!')}
            }) 