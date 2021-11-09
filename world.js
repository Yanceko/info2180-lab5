window.onload= function (){
    let countrybutton = document.getElementById('lookup');
    let citybutton = document.getElementById('lookup2');
    let result = document.getElementById('result');
    var getCty = "?country=";
    var getCtxt ="&context=";

    countrybutton.addEventListener('click',function(element){
        element.preventDefault();
        var input = document.getElementById("country").value;
        fetch("world.php"+getCty +input)
        .then(response =>{
            if (response.ok){
                return response.text()
            } else{
                return Promise.reject("Something went wrong")
            }
        
        })
        .then(data => {
            result.innerHTML = data;
        })
        .catch(error => console.log('There was an error: ' + error));
    });

    citybutton.addEventListener('click',function(element){
        element.preventDefault();   
        var input = document.getElementById("country").value;
        fetch("world.php"+getCty + input + getCtxt)
        .then(response =>{
            if (response.ok){
                return response.text()
            } else{
                return Promise.reject("Something went wrong")
            }
        
        })
        .then(data => {
            result.innerHTML = data;
        })
        .catch(error => console.log('There was an error: ' + error));
    });

}