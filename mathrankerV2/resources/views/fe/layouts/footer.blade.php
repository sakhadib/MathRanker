   <!-- foot -->
   <div class="vh-10"></div>
   <div class="hm-7 vh-55 df dfc jcc aic footer-bg">
    <div class="container-fluid mt-5">
      <div class="row ">
        <div class="col-md-4 offset-md-1  df dfc jcfe">
          <div class="container ">
            <div class="row">
              <div class="col-md-12 df jcfs aic">
                <img src="{{url('rsx/logo.svg')}}" alt="" style="width: 280px;">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h1 class="display-3">MathRanker</h1>
                <p class="lead">A new horizon awaits mathematical geniuses, where they can discover their hidden talents and showcase them to the world.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <h3 class="display-6">Quick Links</h3>
                <hr>
                <ul class="list-unstyled">
                  <li><a href="/" class="link-l">Home</a></li>
                  <li><a href="/contests" class="link-l">Contests</a></li>
                  <li><a href="/leaderboard" class="link-l">Leaderboard</a></li>
                  <li><a href="/profile" class="link-l">Profile</a></li>
                  <li><a href="/about" class="link-l">About</a></li>
                  <li><a href="/contact" class="link-l">Contact</a></li>
                </ul>
              </div>
              <div class="col-4">
                <h3 class="display-6">Contact Us</h3>
                <hr>
                <ul class="list-unstyled">
                  <li><a href="mailto:sakhawatadib@gmail.com" class="link-l">Email Us</a></li>
                  <li><a href="https://www.facebook.com/adib.sakhawat" class="link-l">Facebook</a></li>
                  <li><a href="https://www.linkedin.com/in/sakhadib" class="link-l">LinkedIn</a></li>
                </ul>
              </div>
              <div class="col-4">
                <h3 class="display-6">Legal</h3>
                <hr>
                <ul class="list-unstyled">
                  <li><a href="/privacypolicy" class="link-l">Privacy Policy</a></li>
                  <li><a href="/privacypolicy" class="link-l">Terms of Service</a></li>
                  <li><a href="/privacypolicy" class="link-l">Cookie Policy</a></li>
                </ul>
              </div>

            </div>
            <div class="row mt-5">
              <div class="col-12 df jcfs aic">
                <p class="lead">An SPL Project Developed By 
                  <a href="https://portfolio.sakhawatadib.com" class="link-l">Adib Sakhawat</a> ,
                  <a href="https://tahsinrayshad.com" class="link-l">Tahsin Islam Rayshad</a> &
                  <a href="https://www.linkedin.com/in/takia-farhin-70aa4b256/" class="link-l">Takia Farhin</a> <br>
                  at <a href="https://www.iut-dhaka.edu" class="link-success bold">Islamic University of Technology</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 df jcc aic">
          
          <p class="lead">© <span id="current-date"></span> MathRanker. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div> 


  <style>
    .footer-bg{
      background-color: rgba(27,117,188,0.1)
    }
  </style>

<!-- Add your Custom Styles here -->
<style>
    .main-home{
      background: rgb(231,236,255);
      background: radial-gradient(circle, rgba(231,236,255,1) 0%, rgba(254,254,254,0.5886729691876751) 100%);
    }

    .btn{
        border-radius: 0px;
    }

    .this-stat{

        
        margin-top: -4rem;
    }

    .glow{
        background: white;
        box-shadow: 0px 0px 10px 0px #c5c5c5;
    }

    .frst{
      margin-top: -100px;
    }

    .scnd{
      margin-top: -50px;
    }
</style>

<script>
    new DataTable('#stable');
</script>



<script>
    // Function to animate the counting process
    function animateCount(currentCount, maxCount, elementId) {
        let countElement = document.getElementById(elementId);
        let duration = 2000; // 2 seconds
        let increment = 1; // Count increment by 1

        function updateCount() {
            countElement.textContent = currentCount;
            if (currentCount < maxCount) {
                setTimeout(updateCount, duration / maxCount);
                currentCount += increment;
            }
        }

        updateCount();
    }

    // Start the animations
    //animateCount(1, 45, 'q_ct');
    //animateCount(1, 23, 'u_ct');
    //animateCount(1, 6, 'c_ct');
</script>

<script>
  // Function to toggle class and set cookie
  let l_str = "uil-moonset";
  let d_str = "uil-sun";
  let boolVariable = false;
  let html = document.querySelector("html");
  function toggleClass() {
    // Toggle the boolean variable
    boolVariable = !boolVariable;

    // Get the element with id "dmi"
    const dmiElement = document.getElementById("dmi");
    const postContent = document.getElementById("typed-math");

    // If boolVariable is true, add class "d_str", otherwise add class "l_str"
    if (boolVariable) {
      dmiElement.classList.remove('uil-moonset');
      dmiElement.classList.add('uil-sun');
      if(postContent != null){
        postContent.classList.remove('post-content-white');
        postContent.classList.add('post-content-dark');
      }
      html.classList.add('dark');
      html.setAttribute('data-bs-theme', 'dark');
      // Set cookie preference to "dark"
      document.cookie = "mode=dark";
    } else {
      dmiElement.classList.remove('uil-sun');
      dmiElement.classList.add('uil-moonset');
      if(postContent != null){
        postContent.classList.remove('post-content-dark');
        postContent.classList.add('post-content-white');
      }
      html.classList.remove('light');
      html.setAttribute('data-bs-theme', 'light');
      // Set cookie preference to "light"
      document.cookie = "mode=light";
    }
  }

  // Function to check cookie preference on page load
  function checkCookiePreference() {
    const cookies = document.cookie.split(";").map(cookie => cookie.trim().split("="));
    const modeCookie = cookies.find(cookie => cookie[0] === "mode");

    const html = document.querySelector("html");

    const dmiElement = document.getElementById("dmi");
    const postContent = document.getElementById("typed-math");

    if (modeCookie) {
      const mode = modeCookie[1];
      if (mode === "dark") {
        html.classList.add("dark");
        html.setAttribute("data-bs-theme", "dark");
        dmiElement.classList.remove('uil-moonset');
        dmiElement.classList.add('uil-sun');
        if(postContent != null){
          postContent.classList.remove('post-content-white');
          postContent.classList.add('post-content-dark');
        }
        
        
      } else {
        html.classList.remove("dark");
        html.setAttribute("data-bs-theme", "light");
        dmiElement.classList.remove('uil-sun');
        dmiElement.classList.add('uil-moonset');
        if(postContent != null){
          postContent.classList.remove('post-content-dark');
          postContent.classList.add('post-content-white');
        }
      }
    } else {
      // If cookie is not set, default to light mode and set cookie
      html.classList.remove("dark");
      document.cookie = "mode=light";
    }
  }

  // Add click event listener to element with id "dm"
  document.getElementById("dm").addEventListener("click", toggleClass);

  // Check cookie preference on page load
  checkCookiePreference();
</script>

<script>
  // Function to format the date nicely
  function formatDate(date) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      return date.toLocaleDateString(undefined, options);
  }

  // Get the current date
  const currentDate = new Date();

  // Format the current date
  const formattedDate = formatDate(currentDate);

  // Set the formatted date to the span with id "current-date"
  document.getElementById('current-date').textContent = formattedDate;
</script>

<!-- Foot end -->
</body>
</html>

