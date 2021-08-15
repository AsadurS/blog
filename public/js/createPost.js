function sendData(){
    var title           = document.getElementById('title').value;
    var image           = document.getElementById('image').files[0];
    var description     = document.getElementById('description').value;
    var category_id     = document.getElementById('category_id').value;
    
    var formData = new FormData();
    formData.append('image',image);
    formData.append('title',title);
    formData.append('description',description);
    formData.append('category_id',category_id);
    axios.post('http://127.0.0.1:8000/post/create', formData)  
    .then(function (response) {
        alert('Post create successful!');
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
}