function updateData(id){
    var name = document.getElementById('category').value;
    var id   = id;
    var data ={
        id  : id,
        name: name
    }
axios.post('http://127.0.0.1:8000/category/update', data)  
  .then(function (response) {
    alert('Category update successful!');
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
 });
}