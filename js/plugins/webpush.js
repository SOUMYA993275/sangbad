const uri = 'https://api.webpushr.com/v1/site/subscriber_count';
let myHeaders =  new Headers();
myHeaders.append('webpushrKey', 'c5f85f0c1f3d0de7a3a997c5e74b8fb3');
myHeaders.append('webpushrAuthToken', 28164);
myHeaders.append('Content-Type', 'Application/Json');
let req = new Request(uri, {
    method: 'GET',
    headres: myHeaders,
    mode: 'cors'
});

fetch (req)
    .then( (response)=>{

    })

    .then( (jsonData)=>{

    })

    .catch( (err)=>{
        console.log('ERROR',err.message);
    });