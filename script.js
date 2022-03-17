console.log("js script is working!")

var hello = "hello";




function mydata() {
  fetch("https://free-news.p.rapidapi.com/v1/search?q=bitcoin%2C%20ethereum&lang=en&page=1", {
	  "method": "GET",
	  "headers": {
		"x-rapidapi-host": "free-news.p.rapidapi.com",
		"x-rapidapi-key": "fc6f5f41bfmshb50a75999c65417p13ac81jsn45483f53f901"
	}
  })
  .then(response => response.json())
  .then((data) => console.log(data))
  .catch(err => {
	  console.error(err);
  });
}
