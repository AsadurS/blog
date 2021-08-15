function deleteCategory(id){
    var id = id;
    var data ={
        id: id
    }
    
    axios.post('http://127.0.0.1:8000/category/delete', data)  
    .then(function (response) {
        alert('Category deleted successful!');
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
} 