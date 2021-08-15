function deletePost(id){
    var id = id;
    var data ={
        id: id
    }
    
    axios.post('http://127.0.0.1:8000/post/delete', data)  
    .then(function (response) {
        alert('Post deleted successful!');
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
} 