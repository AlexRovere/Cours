function testApi()
{
  fetch("https://api.gumroad.com/v2/products", {
  "method": "GET",
  "headers": {
    "Authorization": 'access_token=2b317173a851017f99433bdecd29261f22d5a9da955b72761b5af5c110f85903',
    "Content-type": "application/json; charset=UTF-8"
  },
})
.then(response => {
  console.log(response);
})
.catch(err => {
  console.error(err);
});
}

testApi();
