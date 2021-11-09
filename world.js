window.onload= starter;
function starter(){
    let countrybtn = document.getElementById('lookup');
    let message = document.getElementById('result');
    console.log(countrybtn)
    countrybtn.addEventListener('click',function(element){
        element.preventDefault();
        var form = document.getElementById("country").value;
        fetch("world.php"+"? country=" +form)
        .then(response =>{
            if (response.ok){
                return response.text()
            } else{
                return Promise.reject("There was an error")
            }
        
        })
        .then(data => {
            message.innerHTML = data;
        })
        .catch(error => console.log('There was an error: ' + error));
    });

}