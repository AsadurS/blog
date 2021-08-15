function sendData(){
    var name = document.getElementById('category').value;

    var data ={
        name: name
    }
    axios.post('http://127.0.0.1:8000/category/create', data)  
    .then(function (response) {
        alert('Category create successful!');
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
}